@extends('layout.admin')

@section('main-content')
    <hr>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2 rounded">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Pemesanan ambulance</li>
        </ol>
    </nav>
    <div class="dashboard-content card d-flex flex-column p-4 bg-white">
        <div class="dashboard-title">
            <i class="uil uil-ambulance"></i>&nbsp;Data Pemesanan Ambulance
        </div>
        <hr class="pb-4">
        <div class="form-action d-flex flex-row w-100 justify-content-between pb-4">
            <div class="buttons d-flex flex-row gap-2">
                <!-- Tombol untuk ekspor ke PDF -->
                <button id="exportPDF" class="btn btn-danger mr-3"><i class="fa fa-file-pdf"></i> Export to PDF</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-middle table-sm " id="myTable">
                <thead class="text-center">
                    <th>No</th>
                    <th>WA</th>
                    <th>Tanggal</th>
                    <th>Resi</th>
                    <th>Ambulance</th>
                    <th>Penerima</th>
                    <th>Penjemputan</th>
                    <th>Tujuan</th>
                    <th>Berkas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($data as $row)
                        <tr>
                            <input type="hidden" value="{{ $row->id }}">
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">
                                <a href="https://wa.me/{{ $row->pengguna->noHP }}?text=Hai,%20{{ $row->nama }}.%20No%20pesanan%20:%20{{ $row->no_resi }}.%20Pengajuan%20telah%20diverifikasi,%20harap%20menunggu%20untuk%20proses%20penjemputan..%0A%0A%0A%0ALebih%20lengkap,%20silahkan%20login%20pada%20https://ambulance.mixdev.id/login"
                                    class="btn btn-sm btn-success">Kirim Pesan WhatsApp</a>
                            </td>
                            <td>{{ $row->created_at->format('d F Y') }}</td>
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
                                @if ($row->status == 'selesai' && $row->foto_penerimaan != null)
                                    <a target="__blank" href="{{ Storage::url($row->foto_penerimaan) }}"
                                        class="btn btn-sm btn-primary mt-2">Lihat Bukti</a>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="buttons">
                                    @if ($row->status == 'diterima' || $row->status == 'menuju lokasi' || $row->status == 'selesai')
                                    @else
                                        <a href="{{ route('pemesanan.edit', $row->id) }}" class="btn btn-warning btn-sm"><i
                                                class="uil uil-edit"></i>Tambahkan Supir</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let table = $('#myTable').DataTable({});

            $('#exportPDF').on('click', function() {
                let url = '{{ route('pemesanan.print') }}';
                window.open(url, '_blank');
            })
        });
    </script>
@endsection
