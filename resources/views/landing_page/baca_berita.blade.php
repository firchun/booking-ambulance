@extends('layout.landing_page.app')
@section('content')
    <section class="service-tab-section section container">
        <div class="service-box tab-pane fade show active" id="dormitory">
            <div class="row">
                <div class="col-lg-12 p-3 d-flex justify-content-center">
                    <img loading="lazy" class="img-fluid"
                        src="{{ $berita->foto_berita ? Storage::url($berita->foto_berita) : asset('img/no-image.png') }}"
                        alt="service-image" style="width: 50%;">
                </div>
                <div class="col-lg-12 p-3">
                    <div class="contents">
                        <div class="text-dark text-center">
                            <h3>{{ $berita->judul_berita }}</h3>
                            <hr>
                        </div>
                        <div class="text">
                            <p>{{ $berita->isi_berita }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
