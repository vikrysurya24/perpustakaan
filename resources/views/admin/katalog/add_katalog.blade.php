@extends('layouts.admin')
@section('header', 'Katalog')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Add Katalog</h3>
            </div>
            <form method="POST" action="{{ url('data/katalog') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Katalog</label>
                        <input type="text" class="form-control" name="nama">
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