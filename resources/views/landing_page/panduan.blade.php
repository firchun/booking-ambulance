@extends('layout.landing_page.app')
@section('content')
    <section class="section container">
        <h2 class="text-center mb-3 text-dark">{{ $title }}</h2>
        <div class="text-center mb-3">
            <a href="{{ $file }}" download class="btn btn-success"><i class="fa fa-download"></i> Download File</a>
        </div>
        <iframe src="{{ $file }}" class="container" style="min-height: 500px; border:0;"></iframe>
    </section>
    <div class="section">
        <div class="container">

            <div class="section-title text-center">
                <h3>Persyaratan
                </h3>
            </div>
            <div class="content-block">

                <ul>
                    <li><i class="fas fa-caret-right"></i> Surat Keterangan Tidak Mampu</li>
                    <li><i class="fas fa-caret-right"></i> Surat Keterangan Meninggal Dunia</li>
                    <li><i class="fas fa-caret-right"></i> Kartu Tanda Penduduk</li>
                    <li><i class="fas fa-caret-right"></i> Kartu Keluarga</li>
                </ul>

            </div>
        </div>
    </div>
@endsection
