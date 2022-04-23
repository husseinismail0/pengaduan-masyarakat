@extends('layout.app')

@section('content')
    <table class="table table-hover table-bordered mt-5">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Isi Laporan Pengaduan</th>
                <th scope="col">Foto</th>
                <th scope="col">Status Pengaduan</th>
                <th scope="col">Waktu Pengaduan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complaints as $complaint)
            <tr class="text-center">
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$complaint['nik']}}</td>
                <td>{{$complaint['name']}}</td>
                <td>{{$complaint['address']}}</td>
                <td>{{$complaint['phone_number']}}</td>
                <td>{{$complaint['report']}}</td>
                <td><img src="{{ asset('storage/'.$complaint['photo'])}}" alt="" srcset="" style="width:5rem;height:5rem"></td>
                <td>{{$complaint['status']}}</td>
                <td>{{$complaint['created_at']}}</td>
                <td class="d-flex justify-content-around">
                    @if ($user->role === 'PETUGAS')
                    <a href="{{route('complaint.detail', $complaint['id'])}}" class="btn btn-primary px-2">
                        Edit
                    </a>
                    <form
                        action="{{ route('complaint.delete', $complaint['id']) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('hapus data?')"
                            class="btn btn-danger">
                            Hapus
                        </button>
                    </form>
                    @endif
                    @if ($user->role === 'ADMIN')
                    <a target="_blank" href="{{route('complaint.print', $complaint['id'])}}" class="btn btn-success ms-2">
                        Print
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
