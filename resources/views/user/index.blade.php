@extends('layout.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div>
        <a class="btn btn-primary mb-2 float-end" href="{{route('user.createForm')}}">Tambah Data</a>
    </div>
    <table class="table table-hover table-bordered mt-2">
    <thead class="table-dark">
        <tr class="text-center">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Username</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Role</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $data)
        <tr class="text-center">
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$data['name']}}</td>
        <td>{{$data['username']}}</td>
        <td>{{$data['phone']}}</td>
        <td>{{$data['role']}}</td>
        <td>
            <form
                action="{{ route('user.delete', $data['id']) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('GET')
                <button onclick="return confirm('hapus data?')"
                    class="btn btn-danger ms-2">
                    Hapus
                </button>
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection
