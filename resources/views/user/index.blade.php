@extends('user.layouts.main')
@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">

                <center class="m-t-30">
                    <img src="{{ asset('panel/assets/images/users/poros.png') }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ $data['detail']['nama'] }}</h4>
                    <h5 class="card-title m-t-30">{{ $data['detail']['jabatan'] }}</h5>
                    <p class="card-title m-t-0" id="dept">{{ $data['detail']['departemen'] }}</p>
                </center>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @if($data['jadwal'] == 1)
                <center class="m-t-0">
                    <h5 class="card-title m-t-0">Jadwal piket kamu :</h5>
                    <h6 class="card-title m-t-0">day, hh:mm - hh:mm</h6>
                </center>
                @else
                <center class="m-t-0">
                    <h5 class="card-title m-t-0">Kamu belum daftar Piket!</h5>
                    <a href="{{ route('user.daftar') }}" class="btn waves-effect waves-light btn-info"> Daftar Sekarang!</a>
                </center>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material">
                    <div class="form-group">
                        <label class="col-md-12">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" value="{{ $data['detail']['nama'] }}" disabled>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">NIM</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" value="{{ $data['detail']['nim'] }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Fakultas</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" value="{{ $data['detail']['fakultas'] }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Jurusan</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" value="{{ $data['detail']['jurusan'] }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Prodi</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" value="{{ $data['detail']['prodi'] }}" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection