@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    List User
                    <a href="{{route('wait')}}" class="btn btn-dark btn-sm">Tampilkan Staff</a>
                    <a href="{{route('process')}}" class="btn btn-primary btn-sm">Tampilkan Administrator</a>
                    <a href="{{route('done')}}" class="btn btn-success btn-sm">Tampilkan Manager</a>
                    <a href="{{route('users.index')}}" class="btn btn-light btn-sm">Tampilkan Semua</a>
                    <form action="{{route('user.search')}}" method="get">
                        
                        <div class="row mt-3">
                            <div class="col">
                                <input type="text" name="name" class="form-control" placeholder="Cari berdasarkan nama">
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
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->level}}</td>
                                    <td>
                                        <a href="{{route('users.show', $user->id)}}" class="btn btn-dark btn-sm">Detail</a>
                                        <!-- <a href="{{route('home.show', $user->id)}}" class="btn btn-danger btn-sm">Hapus</a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
