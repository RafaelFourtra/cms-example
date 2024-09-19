@extends('layouts.app')
@section('title', 'Blog')

@section('content')
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Blog & News</h4>
                <h1 class="display-5 mb-4">Articles <span class="text-primary">{{ $categoryFilter }}</span></h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
                @foreach ($articles as $article)
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="{{ asset($article->thumbnail) }}" class="img-fluid w-100 rounded" alt="">
                            <div class="blog-title">
                                <a href="#" class="btn">{{$article->category->category}}</a>
                            </div>
                        </div>
                        <a href="{{ route('pages.articles.show', $article->id) }}" class="h4 d-inline-block mb-3">{{$article->title}}</a>
                        {{-- <div class="mb-4">
                            {!! $article->description !!}
                        </div> --}}
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets1/img/testimonial-1.jpg') }}" class="img-fluid rounded-circle"
                                style="width: 60px; height: 60px;" alt="">
                            <div class="ms-3">
                                <h5>{{$article->author}}</h5>
                                <p class="mb-0">{{$article->publication_date}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection