@extends('layout.app')
@section('content')
    <div class="container-fluid bg-light min-vh-100 p-4 d-flex flex-row">
        <div class="booked w-100 p-4">
            <h3>Daftar Ambulance</h3>
            <div class="card bg-light d-flex p-4 gap-4">
                <table class="table">
                    <thead class="bg-info text-center">
                        <th>No</th>
                        <th>Merk</th>
                        <th>No Polisi</th>
                        <th>Status</th>
                    </thead>
                    <tbody class="text-center">
                        <?php $i = 1; ?>
                            @foreach ($ambulance as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->merk}}</td>
                                <td>{{$item->noPolisi}}</td>
                                <td>
                                    @if ($item->status == 'tersedia')
                                        <div class="badge bg-success">
                                            {{$item->status}}
                                        </div>
                                    @else
                                        <div class="badge bg-danger">
                                            {{$item->status}}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                
            </div>
        </div>
    </div>
@endsection