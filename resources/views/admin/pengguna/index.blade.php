@extends('layout.admin')

@section('main-content')
        <hr>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2 rounded">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Pengguna</li>
            </ol>
        </nav>
        <div class="dashboard-content card d-flex flex-column p-4 bg-white">
            <div class="dashboard-title">
                <i class="uil uil-cube"></i>&nbsp;Data Pengguna
            </div>
            <hr class="pb-4">
            <div class="form-action d-flex flex-row w-100 justify-content-between pb-4">
                <div class="buttons d-flex flex-row gap-2">
                    <a href="{{ route('pengguna.create') }}" class="btn btn-primary"><i class="uil uil-plus"></i>&nbsp;Tambah Pengguna</a>
                </div>                
            </div>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($data as $row)      
                    <tr>
                        <input type="hidden" value="{{ $row->id }}">
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{ $row->nama }}</td>   
                        <td>{{ $row->alamat }}</td> 
                        <td>{{ $row->email }}</td>
                        <td class="text-center">
                        <div class="btn btn-{{ $row->status == 'diproses' ? 'warning' : ($row->status == 'disetujui' ? 'success' : 'danger') }} btn-sm">{{ $row->status }}</div>
                        </td>
                        <td class="text-center">
                                <div class="buttons">
                                    <a href="{{ route('pengguna.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <button onclick="triggerDelete('{{ route('pengguna.destroy', $row->id) }}')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
    function triggerDelete(url) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: 'Data Pengguna Akan Dihapus Permanen',
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.value) {
                // Menggunakan AJAX atau fetch untuk mengirim permintaan hapus ke server
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Periksa respons dari server dan tampilkan pesan sesuai
                    if (data.success) {
                        Swal.fire({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            confirmButtonColor: '#0d6efd'
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal Menghapus Data',
                            icon: 'error',
                            confirmButtonColor: '#dc3545'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Terjadi Kesalahan',
                        icon: 'error',
                        confirmButtonColor: '#dc3545'
                    });
                });
            } else {
                Swal.fire({
                    title: 'Operasi Dihentikan!',
                    icon: 'success',
                    confirmButtonColor: '#0d6efd'
                });
            }
        });
    }
</script>
@endsection
