@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">#{{$service->id}} {{$service->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth
                        <div class="alert alert-success" role="alert">
                            Dibuat oleh IP {{ $service->ip_address }}
                        </div>
                        @if (($service->users()->where('id', '=', Auth::user()->id)->exists() || Auth::user()->level != 'staff') && $service->state == 'process')
                            <a href="{{route('to_done', $service->id)}}" class="btn btn-success btn-block">Selesai</a>
                        @endif
                        @if (Auth::user()->level != 'staff' && $service->state != 'done')
                            <a href="{{route('home.edit', $service->id)}}" class="btn btn-primary btn-block">Tugaskan Reparator</a>
                        @endif
                    @endauth

                    <?php
                        // Create color badge
                        if ($service->state == 'wait') $color_badge = 'dark';
                        else if ($service->state == 'process') $color_badge = 'primary';
                        else if ($service->state == 'done') $color_badge = 'success';
                    ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Informasi
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
                            Status
                            <span class="badge badge-{{$color_badge}}">{{ucwords($service->state)}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
                            Pemilik
                            <span>{{$service->owner}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
                            Divisi
                            <span>{{$service->division->name}}</span>
                        </li>
                        <li class="pt-5 list-group-item d-flex justify-content-between align-items-center">
                            Deskripsi
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
                            {{$service->description}}
                        </li>
                        <li class="pt-5 list-group-item d-flex justify-content-between align-items-center">
                            Reparator
                        </li>
                        @foreach ($service->users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
                                {{$user->name}}
                            </li>
                        @endforeach
                        <li class="pt-5 list-group-item d-flex justify-content-between align-items-center">
                            Garis Waktu
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
                            Menunggu Antrian
                            <span>{{$service->wait_at}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
                            Dalam Proses Perbaikan
                            <span>{{$service->process_at}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
                            Selesai Diperbaiki
                            <span>{{$service->done_at}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
