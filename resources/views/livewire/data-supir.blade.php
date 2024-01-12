<div class="container-fluid d-flex flex-column align-items-end p-0 bg-white min-vh-100 p-4">
    @include('layout/admin/header')
    <hr>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2 rounded">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Supir</li>
        </ol>
    </nav>
    <div class="dashboard-content card d-flex flex-column p-4 bg-white">
        <div class="dashboard-title">
            <i class="uil uil-user-md"></i>&nbsp;Data Supir
        </div>
        <hr class="pb-4">
        <div class="form-action d-flex flex-row w-100 justify-content-between pb-4">
            <div class="buttons d-flex flex-row gap-2">
                <a href="{{ route('supir.create') }}" class="btn btn-primary"><i class="uil uil-plus"></i>&nbsp;Tambah
                    Supir</a>
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
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $row)
                    <tr>
                        <input type="hidden" value="{{ $row->id }}">
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->email }}</td>
                        <td class="text-center">
                            <div class="buttons d-flex gap-2 justify-content-center">
                                <a href="{{ route('supir.edit', $row->id) }}" class="btn btn-warning btn-sm"><i
                                        class="uil uil-edit"></i></a>
                                <button wire:click="$dispatch('triggerDelete',{{ $row->id }})"
                                    class="btn btn-danger btn-sm"><i class="uil uil-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            @this.on('triggerDelete', id => {
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: 'Data Supir Akan Dihapus Permanen',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Hapus!'
                }).then((result) => {
                    // Jika supir mengklik tombol hapus
                    if (result.value) {
                        // Memanggil metode destroy untuk menghapus
                        @this.call('destroy', id)
                        // Respon berhasil
                        Swal.fire({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            confirmButtonColor: '#0d6efd'
                        });
                    } else {
                        Swal.fire({
                            title: 'Operasi Dihentikan!',
                            icon: 'success',
                            confirmButtonColor: '#0d6efd'
                        });
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', () => {
            var row = document.querySelectorAll(".clickable-row");
            row.forEach(element => element.addEventListener("click", (e) => {
                window.location = element.dataset.href;
                e.stopPropagation();
            }));
        });
    </script>
@endpush
