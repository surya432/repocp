@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Mitra</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- /.box-body -->
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Nama</label>
                    <div class="col-10">
                        <input class="form-control" type="search" value="" id="example-search-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Images</label>
                    <div class="col-6">
                        <input class="form-control" type="file" value="" id="example-email-input">
                    </div>
                </div>


                <!-- /.End -->
                <input type="submit" class="btn btn-primary" value="Tambah Data">
            </div>
        </div>
    </div>
</div>
@stop