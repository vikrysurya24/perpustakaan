@extends('layouts.admin')
@section('header', 'Katalog')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Edit Katalog</h3>
            </div>
            <form method="POST" action="{{ url('data/katalog/'. $katalog->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Katalog</label>
                        <input type="text" class="form-control" name="nama" value="{{ $katalog->nama }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection