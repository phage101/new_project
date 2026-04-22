@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Checks</strong></div>
      <div class="card-body">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
          <label class="form-check-label" for="flexCheckChecked">Checked checkbox</label>
        </div>
        <hr>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
          <label class="form-check-label" for="flexCheckIndeterminate">Indeterminate checkbox</label>
        </div>
        <hr>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled>
          <label class="form-check-label" for="flexCheckDisabled">Disabled checkbox</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
          <label class="form-check-label" for="flexCheckCheckedDisabled">Disabled checked checkbox</label>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Checks</strong> <small>Inline</small></div>
      <div class="card-body">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
          <label class="form-check-label" for="inlineCheckbox1">1</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
          <label class="form-check-label" for="inlineCheckbox2">2</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
          <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Checks</strong> <small>Without labels</small></div>
      <div class="card-body">
        <div>
          <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
        </div>
        <div>
          <input class="form-check-input" type="checkbox" id="checkboxNoLabel2" value="" checked aria-label="...">
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Radios</strong></div>
      <div class="card-body">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">Default radio</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">Default checked radio</label>
        </div>
        <hr>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
          <label class="form-check-label" for="flexRadioDisabled">Disabled radio</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioCheckedDisabled" checked disabled>
          <label class="form-check-label" for="flexRadioCheckedDisabled">Disabled checked radio</label>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Switches</strong></div>
      <div class="card-body">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
          <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
          <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
          <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Radios</strong> <small>Inline</small></div>
      <div class="card-body">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
          <label class="form-check-label" for="inlineRadio1">1</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <label class="form-check-label" for="inlineRadio2">2</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled>
          <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
