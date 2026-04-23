@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Carousel</strong> <small>Slides only</small></div>
      <div class="card-body">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="First slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#555" dy=".3em">First slide</text></svg>
            </div>
            <div class="carousel-item">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Second slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#666"/><text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text></svg>
            </div>
            <div class="carousel-item">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Third slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#555"/><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text></svg>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Carousel</strong> <small>With controls</small></div>
      <div class="card-body">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="First slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#555" dy=".3em">First slide</text></svg>
            </div>
            <div class="carousel-item">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Second slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#666"/><text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text></svg>
            </div>
            <div class="carousel-item">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Third slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#555"/><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text></svg>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Carousel</strong> <small>With indicators</small></div>
      <div class="card-body">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="First slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#555" dy=".3em">First slide</text></svg>
            </div>
            <div class="carousel-item">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Second slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#666"/><text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text></svg>
            </div>
            <div class="carousel-item">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Third slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#555"/><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text></svg>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Carousel</strong> <small>With captions</small></div>
      <div class="card-body">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="First slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <svg class="d-block w-100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Second slide" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#666"/></svg>
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
