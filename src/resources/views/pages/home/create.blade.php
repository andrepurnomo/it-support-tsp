@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laporkan Kerusakan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('home.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Kerusakan</label>
                            <input type="text" name="title" class="form-control" required placeholder="Laptop Rusak">
                        </div>
                        <div class="form-group">
                            <label>Pemilik</label>
                            <input type="text" name="owner" class="form-control" required placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label>Divisi</label>
                            <select name="division_id" class="form-control" required>
                                <option value="">Pilih Divisi</option>
                                @foreach ($divisions as $division)
                                    <option value="{{$division->id}}">{{$division->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deksripsi</label>
                            <textarea name="description" class="form-control" placeholder="Isikan deskripsi kerusakan di sini">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="Urgent!">
                            </div>
                        <input type="submit" value="Kirim" class="btn btn-block btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
