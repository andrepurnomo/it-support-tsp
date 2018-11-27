@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    List Perbaikan
                    <a href="{{route('wait')}}" class="btn btn-dark btn-sm">Tampilkan Menunggu</a>
                    <a href="{{route('process')}}" class="btn btn-primary btn-sm">Tampilkan Proses</a>
                    <a href="{{route('done')}}" class="btn btn-success btn-sm">Tampilkan Selesai</a>
                    <a href="{{route('home.index')}}" class="btn btn-light btn-sm">Tampilkan Semua</a>
                    <form action="{{route('home.search')}}" method="post">
                        @csrf
                        <div class="row mt-3">
                            <div class="col">
                                <input type="text" name="id" class="form-control" placeholder="Cari berdasarkan nomor">
                            </div>
                            <div class="col">
                                <input type="submit" value="Cari" class="btn btn-warning btn-block">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Kerusakan</th>
                                <th scope="col">Pemilik</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <th scope="row">{{$service->id}}</th>
                                    <td>{{$service->title}}</td>
                                    <td>{{$service->owner}}</td>
                                    <td>{{$service->division->name}}</td>
                                    <td>{{$service->state}}</td>
                                    <td>{{$service->keterangan}}</td>
                                    <td><a href="{{route('home.show', $service->id)}}" class="btn btn-dark btn-sm">Detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
