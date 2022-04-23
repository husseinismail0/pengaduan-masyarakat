@extends('layout.app')

@section('content')
<div class="row-clearfix mx-4 mt-5 text-center">
    <div class="card">
        <div class="body border-radius-15-important bg-info">
            <div class="row">
                <div class="col-md-6 md-3">
                    <img src="{{ asset('asset/images/report.png') }}" alt="image" class="img-fluid">
                </div>
                <div class="mb-0 col-md-5 md-3 mt-6">
                    <h3 class="mt-5 text-white ">
                        Selamat Datang Di Website Keluhan Masyarakat 
                    </h3>
                    <h4 class="mt-5 mb-0 text-white ">
                        Jika ingin komplin atau mengajukan keluhan anda,bisa klik dibawah ini dan kemudian isi keluhan anda
                    </h4>

                    <a href="{{route('pengaduan')}}" type="button" class="btn btn-primary w-50 rounded-pill mt-4">Isi Keluhan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection