@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Typography</strong> <small>Headings</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">All HTML headings, <code>&lt;h1&gt;</code> through <code>&lt;h6&gt;</code>, are available.</p>
        <h1>h1. Bootstrap heading</h1>
        <h2>h2. Bootstrap heading</h2>
        <h3>h3. Bootstrap heading</h3>
        <h4>h4. Bootstrap heading</h4>
        <h5>h5. Bootstrap heading</h5>
        <h6>h6. Bootstrap heading</h6>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Typography</strong> <small>Display headings</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Traditional heading elements are designed to work best in the meat of your page content. When you need a heading to stand out, consider using a <strong>display heading</strong>—a larger, slightly more opinionated heading style.</p>
        <h1 class="display-1">Display 1</h1>
        <h1 class="display-2">Display 2</h1>
        <h1 class="display-3">Display 3</h1>
        <h1 class="display-4">Display 4</h1>
        <h1 class="display-5">Display 5</h1>
        <h1 class="display-6">Display 6</h1>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Typography</strong> <small>Lead</small></div>
      <div class="card-body">
        <p class="lead">This is a lead paragraph. It stands out from regular paragraphs.</p>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Typography</strong> <small>Inline text elements</small></div>
      <div class="card-body">
        <p>You can use the mark tag to <mark>highlight</mark> text.</p>
        <p><del>This line of text is meant to be treated as deleted text.</del></p>
        <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
        <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
        <p><u>This line of text will render as underlined.</u></p>
        <p><small>This line of text is meant to be treated as fine print.</small></p>
        <p><strong>This line rendered as bold text.</strong></p>
        <p><em>This line rendered as italicized text.</em></p>
        <p><abbr title="attribute">attr</abbr></p>
        <p><abbr title="HyperText Markup Language" class="initialism">HTML</abbr></p>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Typography</strong> <small>Blockquotes</small></div>
      <div class="card-body">
        <blockquote class="blockquote">
          <p>A well-known quote, contained in a blockquote element.</p>
        </blockquote>
        <figure>
          <blockquote class="blockquote">
            <p>A well-known quote, contained in a blockquote element.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
          </figcaption>
        </figure>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Typography</strong> <small>Lists</small></div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <p class="fw-bold">Unordered</p>
            <ul>
              <li>Lorem ipsum dolor sit amet</li>
              <li>Consectetur adipiscing elit</li>
              <li>Integer molestie lorem at massa</li>
              <li>Facilisis in pretium nisl aliquet</li>
              <li>Nulla volutpat aliquam velit</li>
            </ul>
          </div>
          <div class="col-md-4">
            <p class="fw-bold">Ordered</p>
            <ol>
              <li>Lorem ipsum dolor sit amet</li>
              <li>Consectetur adipiscing elit</li>
              <li>Integer molestie lorem at massa</li>
              <li>Facilisis in pretium nisl aliquet</li>
              <li>Nulla volutpat aliquam velit</li>
            </ol>
          </div>
          <div class="col-md-4">
            <p class="fw-bold">Unstyled</p>
            <ul class="list-unstyled">
              <li>Lorem ipsum dolor sit amet</li>
              <li>Consectetur adipiscing elit</li>
              <li>Integer molestie lorem at massa</li>
              <li>Facilisis in pretium nisl aliquet</li>
              <li>Nulla volutpat aliquam velit</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
