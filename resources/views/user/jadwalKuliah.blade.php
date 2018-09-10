@extends('user.layouts.main')
@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Jadwal Kuliah</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Jadwal Kuliah</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                {{-- <th>Kode</th> --}}
                                <th>Mata Kuliah</th>
                                <th>Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail['jadwal'] as $index => $data)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$data->hari}}</td>
                                    <td>{{$data->jam}}</td>
                                    {{-- <td>{{$data['kode']}}</td> --}}
                                    <td>{{$data->matkul}}</td>
                                    <td>{{$data->ruang}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection