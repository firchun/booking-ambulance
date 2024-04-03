<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }} </title>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <link rel="stylesheet" href="{{ public_path('css') }}/pdf/bootstrap.min.css" media="all" />
    <style>
        body {
            font-family: 'times new roman';
        }
    </style>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"> --}}
</head>

<body>
    <main>
        <table class="table table-borderless">
            <tr>
                <td style="width: 20%">
                    <img style="width: 100px;" src="{{ public_path('img') }}/merauke.png">
                </td>
                <td class="text-center" style="width: 80%">DINAS SOSIAL KABUPATEN MERAUKE<br>
                    Jl. Kamizaun Mopah Lama Merauke 99600 Telp/Fax (0971) 325923<br>
                    E-mail: si@unmus.ac.id, Website: http://unmus.ac.id
                </td>
                <td style="width: 20%"></td>
            </tr>
        </table>
        <hr style="border: 1px solid black;">

        <table class="table table-bordered table-sm" style="font-size: 16px;">
            <thead class="text-center">
                <th>No</th>
                <th>Tanggal</th>
                <th>Resi</th>
                <th>Ambulance</th>
                <th>Penerima</th>
                <th>Penjemputan</th>
                <th>Tujuan</th>
                <th>Berkas</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($pemesanan as $row)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{ $row->created_at->format('d F Y') }}</td>
                        <td>{{ $row->no_resi }}</td>
                        <td>
                            <b>Mobil :</b>{{ $row->ambulance->merk }} <br>
                            <b>Plat : </b> <span class="text-danger">{{ $row->ambulance->noPolisi }}</span>
                        </td>
                        <td>{{ $row->pengguna->nama }}</td>
                        <td>
                            <b>Waktu : </b> {{ $row->waktu_penjemputan }}<br>
                            <b>Tanggal : </b> {{ $row->tanggal_penjemputan }}<br>
                            <b>Lokasi : </b> {{ $row->lokasi_penjemputan }}<br>
                        </td>

                        <td>{{ $row->tujuan }}</td>
                        <td>
                            <ol>
                                {!! $row->upload_ktm ? '<li>Keterangan Tidak Mampu</li>' : '' !!}
                                {!! $row->upload_kmd ? '<li>Keterangan Meninggal Dunia</li>' : '' !!}
                                {!! $row->upload_ktp ? '<li>Kartu Tanda Penduduk</li>' : '' !!}
                                {!! $row->upload_kk ? '<li>Kartu Keluarga</li>' : '' !!}
                                {{-- <li>
                                    <a class="{{ $row->upload_ktm == null ? 'text-danger' : '' }}"
                                        href="{{ $row->upload_ktm == null ? '#' : Storage::url($row->upload_ktm) }}"
                                        target="__blank"> Keterangan
                                        Tidak
                                        Mampu</a>
                                </li>
                                <li>
                                    <a class="{{ $row->upload_kmd == null ? 'text-danger' : '' }}"
                                        href="{{ $row->upload_kmd == null ? '#' : Storage::url($row->upload_kmd) }}"
                                        target="__blank"> Keterangan
                                        Meninggal Dunia</a>
                                </li>
                                <li><a class="{{ $row->upload_ktp == null ? 'text-danger' : '' }}"
                                        href="{{ $row->upload_ktp == null ? '#' : Storage::url($row->upload_ktp) }}"
                                        target="__blank"> Kartu Tanda
                                        Penduduk</a></li>
                                <li><a class="{{ $row->upload_kk == null ? 'text-danger' : '' }}"
                                        href="{{ $row->upload_kk == null ? '#' : Storage::url($row->upload_kk) }}"
                                        target="__blank"> Kartu Keluarga</a>
                                </li> --}}
                            </ol>
                        </td>

                        <td class="text-center">

                            {{ $row->status }}

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="mt-3 float-right text-center">
            Merauke , {{ date('d F Y') }}<br>
            Ketua Jurusan {{ App\Models\Configuration::Konfigurasi()->jurusan }}
            <div style="margin-top:80px;">
                <strong><u>{{ App\Models\Configuration::Konfigurasi()->kajur }}</u></strong><br>
                {{ App\Models\Configuration::Konfigurasi()->nip }}
            </div>
        </div> --}}

    </main>

</body>

</html>
