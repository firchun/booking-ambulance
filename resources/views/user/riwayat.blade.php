@extends('layout.app')
@section('content')
    <div class="container-fluid bg-light min-vh-100 p-4 d-flex flex-row">
        <div class="booked w-100 p-4">
            <h3>Riwayat Pemesanan Anda</h3>
            <div class="card bg-light d-flex p-4 gap-4">
                <table class="table table-bordered align-middle " id="myTable">
                    <thead class="text-center">
                        <th>No</th>
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
                        @foreach ($riwayat as $row)
                            <tr>
                                <input type="hidden" value="{{ $row->id }}">
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $row->no_resi }}</td>
                                <td>
                                    <b>Mobil : </b>{{ $row->ambulance->merk }} <br>
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
                                    <ul>
                                        <li>
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
                                        </li>
                                    </ul>
                                </td>

                                <td class="text-center">
                                    <div
                                        class="badge @if ($row->status == 'proses') bg-warning @elseif($row->status == 'diterima' || $row->status == 'menuju lokasi') bg-info @elseif($row->status == 'selesai') bg-success @endif">
                                        {{ $row->status }}
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
