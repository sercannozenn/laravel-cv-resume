@extends('layouts.front')
@section('title')
    {{ $portfolio->title }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
@endsection

@section('content')
    <section class="portfolio-section">
        <h2 class="section-title mb-0">{{ $portfolio->title }}</h2>
        <small>{{ $portfolio->tags }}</small>
        <hr>

        {!! $portfolio->about !!}
        <hr>

        <div class="portfolio-wrapper">
            @foreach($portfolio->images as $item)
                <figure class="portfolio-item hover-box" href="{{ asset('storage/portfolio/'.$item->image)  }}">
                    <img src="{{ asset('storage/portfolio/'.$item->image)  }}"
                         alt="{{ $portfolio->title }}"
                         class="portfolio-item-img">
                </figure>
            @endforeach
        </div>

    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $(document).ready(function ()
        {

            $('.portfolio-item').magnificPopup({
                gallery: {
                    enabled: true
                },
                type: 'image' // this is default type
            });
        });
    </script>
@endsection
