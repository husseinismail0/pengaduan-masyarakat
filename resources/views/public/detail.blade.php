@extends('layout.app')
@section('content')
    <table class="table table-hover table-bordered mt-5">
    <thead class="table-dark">
        <tr class="text-center" >
        <th scope="col">No</th>
        <th scope="col">NIK</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Isi Laporan Pengaduan</th>
        <th scope="col">Foto</th>
        <th scope="col">Status Pengaduan</th>
        <th scope="col">Waktu Pengaduan</th>
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
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection
