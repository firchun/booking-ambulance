<div class="container-fluid d-flex flex-column align-items-end p-0 bg-white min-vh-100 p-4">
    @include('layout/admin/header')
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
                <div class="w-25">
                    <input type="text" name="" wire:model.live="search" id="" class="form-control"
                        placeholder="Cari...">
                </div>
            </div>
            <div class="form">
                <div class="d-flex flex-row gap-2 align-items-center">
                    <label for="" class="fw-bold">Tampilkan : </label>
                    <div>
                        <select name="" wire:model="paginate" id="" class="form-select">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-responsive table-bordered align-middle">
            <thead class="text-center">
                <th>No</th>
                <th>Resi</th>
                <th>Ambulance</th>
                <th>Penerima</th>
                <th>Waktu Penjemputan</th>
                <th>Tanggal Penjemputan</th>
                <th>Alamat Penjemputan</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $row)
                    <tr>
                        <input type="hidden" value="{{ $row->id }}">
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{ $row->no_resi }}</td>
                        <td>
                            <p>{{ $row->merk }}</p>
                            <p>{{ $row->noPolisi }}</p>
                        </td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->waktu_penjemputan }}</td>
                        <td>{{ $row->tanggal_penjemputan }}</td>
                        <td>{{ $row->lokasi_penjemputan }}</td>
                        <td>{{ $row->tujuan }}</td>
                        <td class="text-center">
                            <div
                                class="badge @if ($row->status == 'proses') bg-warning @elseif($row->status == 'diterima' || $row->status == 'menuju lokasi') bg-info @elseif($row->status == 'selesai') bg-success @endif">
                                {{ $row->status }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="buttons d-flex gap-2 justify-content-center">
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
