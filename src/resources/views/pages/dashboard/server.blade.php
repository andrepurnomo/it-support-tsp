@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Status Server</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Alias</th>
                                <th scope="col">Location</th>
                                <th scope="col">Uptime</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servers as $server)
                                <tr class="table-{{ $server->status == 'UP' ? 'success' : 'danger' }}">
                                    <th scope="row">{{$server->id}}</th>
                                    <td>{{$server->alias}}</td>
                                    <td>{{$server->location}}</td>
                                    <td>{{$server->uptime}}</td>
                                    <td>{{$server->status}}</td>
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
