@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laporan Perbaikan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('report.result')}}" method="get">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="date_start" class="form-control" required placeholder="Laptop Rusak">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" name="date_end" class="form-control" required placeholder="John Doe">
                        </div>
                        <input type="submit" value="Submit" class="btn btn-block btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
