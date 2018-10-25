@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buat User Baru</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama</label>
                            <input value="{{$user->name}}" type="text" name="name" class="form-control" required placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input value="{{$user->email}}" type="email" name="email" class="form-control" required placeholder="jdoe@tsp.com">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="isSecretPass">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control" required>
                                <option value="">Pilih Divisi</option>
                                <option <?= ($user->level == 'staff') ? 'selected':'' ?> value="staff">Staff</option>
                                <option <?= ($user->level == 'administrator') ? 'selected':'' ?> value="administrator">Administrator</option>
                                <option <?= ($user->level == 'manager') ? 'selected':'' ?> value="manager">Manager</option>
                            </select>
                        </div>
                        <input type="submit" value="Kirim" class="btn btn-block btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
