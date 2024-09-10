<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <title>Blogge | Personal Blog Site</title>

  <!--Meta For No Index-->
  <meta name="robots" content="noindex, Nofollow, Noimageindex">

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Theme Stylesheet -->
  <link href="{{ asset('assets1/css/style.css') }}" rel="stylesheet" />

  <!--Favicon-->
  <link rel="shortcut icon" href="{{ asset('assets1/images/favicon.svg') }}" type="image/x-icon" />
  <link rel="icon" href="{{ asset('assets1/images/favicon.svg') }}" type="image/x-icon" />
</head>

<body>

<!-- Navbar Start -->
<nav class="main-nav navbar navbar-expand-lg">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="index.html">
      <h2>Medic News</h2>
    </a>
    <!-- Toogle Button -->
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse nav-list" id="mainNav">
      <!-- Navigation Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
      <!-- Social Link -->
      <ul class="main-nav-social">
        <li>
          <a href="#"><i class="fa fa-facebook"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-instagram"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar End -->

{{-- <section class="featured">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <article class="featured-post">
          <div class="featured-post-content">
            <div class="featured-post-author">
              <img src="{{ asset('assets1/images/author.png') }}" alt="author" />
              <p>By <span>Mary Astor</span></p>
            </div>
            <a href="single-blog.html" class="featured-post-title">
              Every Next Level of Your Life Will Demand
            </a>
            <ul class="featured-post-meta">
              <li>
                <i class="fa fa-clock-o"></i>
                October 19, 2020 - 3 min read
              </li>
            </ul>
          </div>
          <div class="featured-post-thumb">
            <img src="{{ asset('assets1/images/featured-post.jpg') }}" alt="feature-post-thumb" />
          </div>
        </article>
      </div>
    </div>
  </div>
</section> --}}

<section class="blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <div class="blog-section-title">
          <h2>Articles</h2>
          <p>View the latest news on Blogger</p>
        </div>
        @foreach ($data as $item)
        <article class="blog-post">
          <div class="blog-post-thumb">
            <img src="{{ $item->thumbnail }}" alt="blog-thum" />
          </div>
          <div class="blog-post-content">
            <div class="blog-post-tag">
              <a href="category.html">Medical</a>
            </div>
            <div class="blog-post-title">
              <a href="single-blog.html">{{ $item->title }}</a>
            </div>
            <div class="blog-post-meta">
              <ul>
                <li>By <a href="about.html">{{ $item->author }}</a></li>
                <li>
                  <i class="fa fa-clock-o"></i>
                  {{ $item->publication_date }}
                </li>
              </ul>
            </div>
            <p>
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
              nonumy.
            </p>
            <a href="{{ route('detail.edit', ['id' => $item->id]) }}" class="blog-post-action">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </article>
        @endforeach
      
        <div class="blog-post-pagination">
          <nav aria-label="Page navigation example" class="nav-bg">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link active" href="#">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="copy-right">
          <p>© Copyright <span id="copyrightYear"></span> - All Rights Reserved by <a href="https://staticmania.com/" target="_blank">StaticMania</a> Distributed By <a href="https://themewagon.com/" target="blank">ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9rV6yesIygoVKTD6QLf_iCa9eiIIHqZ0&libraries=geometry">
</script>
<!-- Vendor JS -->
<script src="{{ asset('assets1/vendor/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('assets1/vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets1/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets1/vendor/g-map/gmap.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets1/js/script.js') }}"></script>
</body>

</html>