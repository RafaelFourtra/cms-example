@extends('layouts.app')
@section('title', 'Profile')

@section('content')
  
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <!-- Kolom Teks -->
            <div class="col-md-7 col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                <div>
                    <h4 class="text-primary">Profile</h4>
                    <h1 class="display-5 mb-4">{{ $data->gelardepan }}, {{ $data->nama }}, {{ $data->gelarbelakang }}</h1>
                    <p class="mb-4">Tanggal & Tempat Lahir : {{ $data->tanggallahir }}, {{ $data->tempatlahir }}</p>
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>Pendidikan</h4>
                                    <p style="color: rgb(29, 29, 29)">SMA - Bagimu Negeriku (2021 - 2024)</p>
                                    <p style="margin-top: -7px;">Lorem Ipsum dolor sit amet...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>Pengalaman</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kolom Gambar -->
            <div class="col-md-5 col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-primary rounded position-relative overflow-hidden">
                    {{-- <img src="{{ asset('assets/img/about-2.png') }}" class="img-fluid rounded w-100" alt="">
                    
                    <div style="position: absolute; top: -15px; right: -15px;">
                        <img src="{{ asset('assets1/img/about-3.png') }}" class="img-fluid" style="width: 150px; height: 150px; opacity: 0.7;" alt="">
                    </div>
                    <div style="position: absolute; top: -20px; left: 10px; transform: rotate(90deg);">
                        <img src="{{ asset('assets1/img/about-4.png') }}" class="img-fluid" style="width: 100px; height: 150px; opacity: 0.9;" alt="">
                    </div> --}}
                    <div class="rounded-bottom">
                        <img src="{{ asset('resources/img/profile/'. $data->foto ) }}" class="img-fluid rounded-bottom w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection