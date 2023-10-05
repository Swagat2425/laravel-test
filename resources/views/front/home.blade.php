@php 
$categories = \App\Helpers\Common::cmn_get_categories();
@endphp
@extends('layouts.app')

@push('styles')
<style>
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
</style>
@endpush

@section('content')
<main class="container">

  <div class="row g-5 mt-1">
    <div class="col-md-8" style="overflow: auto;">

      @foreach($posts as $post)
      <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ date('M d, Y', strtotime($post->crt_on)) }} by <a href="javascript:void(0);">{{ $post->name }}</a></p>

        {!! $post->content !!}
      </article>
      <hr>
      @endforeach

      @if(count($posts) > 0)
      <nav class="blog-pagination mb-3" aria-label="Pagination">
        @php //Request::fullUrl() @endphp
        <a class="btn rounded-pill {{ ($has_prev) ? 'btn-outline-primary' : 'disabled btn-outline-secondary' }}" href="{{ ($has_prev) ? url()->current() . '?ofs=' . $prev_offset : 'javascript:void(0);' }}">Older</a>
        <a class="btn rounded-pill {{ ($has_next) ? 'btn-outline-primary' : 'disabled btn-outline-secondary' }}" href="{{ ($has_next) ? url()->current() . '?ofs=' . $next_offset : 'javascript:void(0);' }}">Newer</a>
      </nav>
      @else
      <div class="alert alert-secondary">
        No Blogs found!
      </div>
      @endif

    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">

        <div>
          <h4 class="fst-italic">Recent posts</h4>
          <ul class="list-unstyled">
            @if(count($recent) > 0)
            @foreach($recent as $post)
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                <div class="col-lg-8">
                  <h6 class="mb-0">{{ $post->title }}</h6>
                  <small class="text-body-secondary">{{ date('M d, Y', strtotime($post->crt_on)) }}</small>
                </div>
              </a>
            </li>
            @endforeach
            @else
            <li>
              No recent posts!
            </li>
            @endif
          </ul>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Categories</h4>
          <ol class="list-unstyled mb-0">
            @foreach($categories as $category)
            <li><a href="{{ url('/blog/' . $category->name) }}">{{ $category->name }}</a></li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection

@push('scripts')

@endpush