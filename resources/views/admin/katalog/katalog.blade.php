@extends('layouts.admin')
@section('header', 'Katalog')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card-header">
            <a href="{{ url('data/katalog/create')}}" class="btn btn-sm btn-primary pull-right">Add Katalog</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama Katalog</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_katalog as $num => $katalog)
                    <tr>
                        <td>{{ $num+1 }}.</td>
                        <td>{{ $katalog->nama}}</td>
                        <td class="text-right">
                            <a href="{{ url('data/katalog/'. $katalog->id .'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ url('data/katalog', ['id' => $katalog->id]) }}" method="POST" class="d-inline-block">
                                <input class="btn btn-sm btn-danger" type="submit" value="Delete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data {{ $katalog->nama }} ?')">
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection