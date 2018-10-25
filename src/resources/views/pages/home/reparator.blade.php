@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tugaskan Reparator
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('home.update', $service->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Reparator</label>
                            <select multiple name="user_ids" class="form-control" required>
                                @foreach ($users as $user)
                                    @if (!$service->users()->where('id', '!=', $user->id)->exists())
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
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
