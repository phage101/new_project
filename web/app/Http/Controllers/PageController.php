<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function show(string $section, string $page): View
    {
        $view = "pages.{$section}.{$page}";

        return view(view()->exists($view) ? $view : 'pages.placeholder', [
            'title' => $this->formatTitle($page),
            'section' => $section,
            'page' => $page,
            'breadcrumbs' => [
                ['label' => ucfirst($section), 'active' => false],
                ['label' => $this->formatTitle($page), 'active' => true],
            ],
        ]);
    }

    private function formatTitle(string $slug): string
    {
        return ucwords(str_replace(['-', '_'], ' ', $slug));
    }
}
