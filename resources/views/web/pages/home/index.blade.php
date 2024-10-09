@extends('layouts.app')
@section('title', 'Home')

<style>
.service-img {
    width: 100%;
    height: 250px; /* Atur tinggi yang seragam untuk semua gambar */
    background-color: #f0f0f0; /* Warna abu-abu jika gambar terlalu kecil */
    display: flex;
    align-items: center;
    justify-content: center;
}

.service-img img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Memastikan gambar mengisi area dengan proporsi yang tetap */
}

</style>

@section('content')
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item">
            <img src="{{ asset('assets1/img/carousel-1.jpg') }}" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-0 gx-5">
                        <div class="col-xl-3"></div>
                        <div class="col-xl-9 animated fadeInLeft">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Selamat Datang</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4">
                                    {{ $opening->title ??
                                        'Tingkatan Pemahaman Perumahsakitan
                                                                                                                                                Barokah Untuk Banyak Umat' }}
                                </h1>
                                <div class="d-flex justify-content-center justify-content-md-end">
                                    <p class="mb-5 fs-5" style="max-width: 70%;">
                                        {{ $opening->description ??
                                            'Tersedia banyak hal terkait perumahsakitan yang terintegrasi dan
                                                                                                                                                            implementatif dengan template dokumen kerja' }}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2"
                                        href="{{ route('pages.profile.index') }}">Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid service pb-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="display-5 mb-4">Materi Pembelajaraan</h1>
                <p class="mb-0">Menyajikan topik-topik penting yang dirancang untuk meningkatkan pemahaman Anda. Setiap
                    materi disusun secara sistematis, memudahkan peserta dalam menerapkan pengetahuan yang diperoleh dalam
                    praktik sehari-hari.
                </p>
            </div>
            <div class="row g-4">
                @foreach ($articles as $item)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ asset($item->thumbnail) }}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4"> {{ $item->title }}</a>
                                <p class="mb-4">{!! $item->description !!}</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4"
                                    href="{{ route('pages.articles.show', $item->id) }}">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid feature pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                {{-- <h4 class="text-primary">Our Features</h4> --}}
                <h1 class="display-5 mb-4">Bentuk Kegiatan</h1>
                {{-- <p class="mb-0">Lorem ipsum dolor, sit ameLt consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic. --}}
                </p>
            </div>
            <div class="row g-4">
                @if (!isset($bentukkegiatan))
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item p-4">
                            <div class="feature-icon p-4 mb-4">
                                <i class="fas fa-chart-line fa-4x text-primary"></i>
                            </div>
                            <h4>Workshop Dengan Lembaga Acara
                            </h4>
                            <p class="mb-4">Ikuti workshop interaktif untuk belajar perencanaan dan manajemen acara dari
                                para ahli. Daftarkan diri Anda dan tingkatkan keterampilan Anda!
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="feature-item p-4">
                            <div class="feature-icon p-4 mb-4">
                                <i class="fas fa-university fa-4x text-primary"></i>
                            </div>
                            <h4>Pelatihan di RS</h4>
                            <p class="mb-4">Pelatihan di rumah sakit memberikan kesempatan untuk meningkatkan keterampilan
                                medis dan pengetahuan praktik klinis. Peserta dapat belajar langsung dari profesional
                                berpengalaman.
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="feature-item p-4">
                            <div class="feature-icon p-4 mb-4">
                                <i class="fas fa-file-alt fa-4x text-primary"></i>
                            </div>
                            <h4>Pendampingan Pembuatan Sistem
                            </h4>
                            <p class="mb-4">Pendampingan dalam pembuatan sistem membantu Faskes lebih efektif dan efisien.
                                Dengan bimbingan ahli, proses pengembangan menjadi lebih terstruktur.
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                    </div>
                @else
                    @foreach ($bentukkegiatan as $item)
                        <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="feature-item p-4">
                                <div class="feature-icon p-4 mb-4">
                                    <i class="fas fa-file-alt fa-4x text-primary"></i>
                                </div>
                                <h4>{{ $item->title }}
                                </h4>
                                <p class="mb-4">{{ $item->description }}
                                </p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </div>
    <div class="container-fluid faq-section pb-5 mb-5">
        <div class="container pb-5 overflow-hidden">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">FAQs</h4>
                <h1 class="display-5 mb-4">Frequently Asked Questions</h1>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="accordion accordion-flush bg-light rounded p-5" id="accordionFlushSection">
                        @foreach ($faq as $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading{{$item->id}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse{{$item->id}}" aria-expanded="false"
                                        aria-controls="flush-collapse{{$item->id}}">
                                        {{ $item->pertanyaan ?? '' }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{$item->id}}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-heading{{$item->id}}" data-bs-parent="#accordionFlushSection">
                                    <div class="accordion-body"> {{ $item->jawaban ?? '' }}

                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-primary rounded">
                        <img src="{{ asset('img/about-2.png') }}" class="img-fluid w-100" alt="">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

