@extends('layout.landing_page.app')
@section('content')
    <!--=================================
                                                                                                                                                                                                                                    =            Page Slider            =
                                                                                                                                                                                                                                    ==================================-->
    <div class="hero-slider">
        <!-- Slider Item -->
        <div class="slider-item slide1" style="background-image:url({{ asset('img/slider/1.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Slide Content Start -->
                        <div class="content style text-center">
                            <h2 class="text-white text-bold mb-2" data-animation-in="slideInLeft">Dinas Sosial</h2>
                            <p class="tag-text mb-4" data-animation-in="slideInRight">Dinas Sosial Kabupaten Merauke - Papua
                                Selatan</p>
                            <a href="{{ url('/login/user') }}" class="btn btn-main btn-white"
                                data-animation-in="slideInLeft" data-duration-in="1.2">Login</a>
                        </div>
                        <!-- Slide Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Item -->
        <div class="slider-item" style="background-image:url({{ asset('img/slider/2.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Slide Content Start-->
                        <div class="content style text-center">
                            <h2 class="text-white" data-animation-in="slideInRight">Dinas Sosial</h2>
                            <p class="tag-text mb-4" data-animation-in="slideInRight" data-duration-in="0.6">
                                Dinas Sosial Kabupaten Merauke - Papua Selatan</p>
                            <a href="{{ url('/login/user') }}" class="btn btn-main btn-white"
                                data-animation-in="slideInRight" data-duration-in="1.2">Login</a>
                        </div>
                        <!-- Slide Content End-->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--====  End of Page Slider  ====-->



    <!--Start about us area-->
    <section class="service-tab-section section container">
        <div class="service-box tab-pane fade show active" id="dormitory">
            <div class="row p-3">
                <div class="col-lg-6">
                    <img loading="lazy" class="img-fluid" src="{{ asset('img/kadis.jpg') }}" alt="service-image">
                </div>
                <div class="col-lg-6">
                    <div class="contents">
                        <div class="section-title">
                            <h3>Sambutan Kepala Dinas Sosial Kabupaten Merauke</h3>
                        </div>
                        <div class="text">
                            <p>The implant fixture is first placed, so that it ilikely to
                                osseointegrate,
                                then a dental prosthetic is added. then a
                                dental prosthetic is added.then a dental pros- thetic is added.
                            </p>
                            <p>The implant fixture is first placed, so that it ilikely to
                                osseointegrate,
                                then a dental prosthetic is added. then a dental
                                prosthetic is added.then a dental pros- thetic is added.</p>
                        </div>

                        {{-- <a href="services.html" class="btn btn-style-one">Read more</a> --}}
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--End about us area-->




    <!--team section-->
    <section class="team-section section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Daftar Berita
                </h3>

            </div>
            <div class="row justify-content-center">
                @if ($berita)
                    @foreach ($berita as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="team-member">
                                <img loading="lazy"
                                    src="{{ $item->foto_berita ? Storage::url($item->foto_berita) : asset('img/no-image.png') }}"
                                    alt="doctor" class="img-fluid">
                                <div class="contents text-center">
                                    <h4>{{ $item->judul_berita }}</h4>
                                    <small class="badge badge-info">{{ $item->created_at->format('d F Y') }}</small>
                                    <p>{{ Str::limit($item->isi_berita, 100) }}
                                    </p>
                                    <a href="{{ url('/baca_berita', $item->slug) }}" class="btn btn-main">baca berita</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="text-muted">Belum ada berita..</h4>
                @endif
            </div>
        </div>
    </section>
    <!--End team section-->
@endsection
