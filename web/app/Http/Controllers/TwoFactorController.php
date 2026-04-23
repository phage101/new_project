<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorController extends Controller
{
    private Google2FA $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FA();
    }

    // ── Setup (enrollment) ───────────────────────────────────────────────────

    public function showSetup()
    {
        $user   = Auth::user();
        $secret = $this->google2fa->generateSecretKey();

        // Store the pending secret in the session until the user confirms it.
        session(['2fa_pending_secret' => $secret]);

        $qrUrl  = $this->google2fa->getQRCodeUrl('LOGIFY', $user->email, $secret);
        $qrSvg  = $this->buildSvg($qrUrl);

        return view('auth.2fa-setup', compact('secret', 'qrSvg'));
    }

    public function enable(Request $request)
    {
        $request->validate(['code' => ['required', 'digits:6']]);

        $secret = session('2fa_pending_secret');
        if (!$secret) {
            return redirect()->route('two-factor.setup')
                ->with('error', 'Session expired. Please start again.');
        }

        $valid = $this->google2fa->verifyKey($secret, $request->input('code'));
        if (!$valid) {
            return back()->withErrors(['code' => 'The code was invalid. Please try again.']);
        }

        $user = Auth::user();
        $user->update([
            'two_factor_secret'       => $secret,
            'two_factor_confirmed_at' => now(),
        ]);
        session()->forget('2fa_pending_secret');

        ActivityLog::create([
            'user_id'    => $user->id,
            'action'     => '2fa.enabled',
            'model_type' => get_class($user),
            'model_id'   => $user->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Two-factor authentication enabled.');
    }

    public function disable(Request $request)
    {
        $request->validate(['password' => ['required', 'current_password']]);

        $user = Auth::user();
        $user->update([
            'two_factor_secret'       => null,
            'two_factor_confirmed_at' => null,
        ]);

        ActivityLog::create([
            'user_id'    => $user->id,
            'action'     => '2fa.disabled',
            'model_type' => get_class($user),
            'model_id'   => $user->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Two-factor authentication disabled.');
    }

    // ── Challenge (login step 2) ─────────────────────────────────────────────

    public function showChallenge()
    {
        if (!session('2fa_user_id')) {
            return redirect()->route('login');
        }
        return view('auth.2fa-challenge');
    }

    public function verifyChallenge(Request $request)
    {
        $request->validate(['code' => ['required', 'digits:6']]);

        $userId   = session('2fa_user_id');
        $remember = session('2fa_remember', false);

        if (!$userId) {
            return redirect()->route('login');
        }

        $user = \App\Models\User::find($userId);
        if (!$user || !$user->two_factor_secret) {
            session()->forget(['2fa_user_id', '2fa_remember']);
            return redirect()->route('login');
        }

        $valid = $this->google2fa->verifyKey(
            $user->two_factor_secret,
            $request->input('code')
        );

        if (!$valid) {
            return back()->withErrors(['code' => 'The code was invalid. Please try again.']);
        }

        session()->forget(['2fa_user_id', '2fa_remember']);
        Auth::loginUsingId($userId, $remember);
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }

    // ── Helpers ──────────────────────────────────────────────────────────────

    private function buildSvg(string $url): string
    {
        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new SvgImageBackEnd()
        );
        return (new Writer($renderer))->writeString($url);
    }
}
