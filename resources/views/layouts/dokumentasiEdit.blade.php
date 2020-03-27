@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Ubah Dokumentasi</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- /.box-body -->
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">ID</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" type="search" value="" id="example-search-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Deskripsi</label>
                    <div class="col-10">
                        <input class="form-control" type="search" value="" id="example-search-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Tanggal</label>
                    <div class="col-10">
                        <input class="form-control" type="search" value="" id="example-search-input">
                    </div>
                </div>


                <!-- /.End -->
                <input type="submit" class="btn btn-primary" value="Simpan Data">
            </div>
        </div>
    </div>
</div>
@stop