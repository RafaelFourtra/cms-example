<!-- Topbar Start -->
<div class="container-fluid topbar bg-light px-5 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-flex flex-wrap">
                <a href="#" class="text-muted small me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find
                    A Location</a>
                <a href="tel:+01234567890" class="text-muted small me-4"><i
                        class="fas fa-phone-alt text-primary me-2"></i>{{ $info->notelp ?? '+01234567890' }}</a>
                <a href="mailto:example@gmail.com" class="text-muted small me-0"><i
                        class="fas fa-envelope text-primary me-2"></i>{{ $info->email ?? 'Example@gmail.com' }}</a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary"></i>Hatrick</h1>
            <!-- <img src="{{ asset('assets1/img/logo.png') }}" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('pages.home.index') }}" class="nav-item nav-link">Home</a>
                {{-- <a href="about.html" class="nav-item nav-link">About</a> --}}
                {{-- <a href="service.html" class="nav-item nav-link">Services</a> --}}
                <a href="{{ route('pages.profile.index') }}" class="nav-item nav-link">Profile</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <span class="deropdown-toggle">Blog</span>
                    </a>
                    <div class="dropdown-menu m-0">
                        @foreach ($category as $item)
                            <a href="{{ route('pages.articles.index', ['category' => $item->id]) }}"
                                class="dropdown-item">{{ $item->category }}</a>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">Pages</span>
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="feature.html" class="dropdown-item">Our Features</a>
                        <a href="team.html" class="dropdown-item">Our team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="offer.html" class="dropdown-item">Our offer</a>
                        <a href="FAQ.html" class="dropdown-item">FAQs</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> --}}
                {{-- <a href="contact.html" class="nav-item nav-link">Contact Us</a> --}}
            </div>
            {{-- <a href="#" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Get Started</a> --}}
        </div>
    </nav>

    <!-- Header Start -->

    <!-- Header End -->
</div>
<!-- Navbar & Hero End -->
