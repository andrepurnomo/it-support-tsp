@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">#{{$user->id}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col">
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-block">Update User</a></div>
                        <div class="col">
                            <form action="#" method="delete">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="{{$user->id}}">
                                <input type="submit" value="Hapus" class="btn btn-danger btn-block">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nama
                                    <span>{{$user->name}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Email
                                    <span>{{$user->email}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Level
                                    <span>{{$user->level}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
