@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Tentang Kami</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- /.box-body -->
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> ada masalah input data!.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::open(array('route' => ['about.store'],'method'=>'POST','role' =>
                'form','autocomplete'=>'off', 'id' => 'my_form','enctype'=>"multipart/form-data")) !!}
 
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Nama</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Tahun</label>
                    <div class="col-10">
                        <input class="col-2 form-control" type="search" value="" name="year">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Icon</label>
                    <div class="col-6">
                        <input class="form-control" type="file" value="" name="images">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Deskripsi</label>
                    <div class="col-10">
                        <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Status</label>
                    <div class="col-4">
                        <Select class="form-control" name="flag" >
                        <option value="active">Active</option>
                        <option value="nonactive">Non Active</option>
                        </Select>
                    </div>
                </div>


                <!-- /.End -->
                <button type="submit" id="saveBtn" value="create"
                    class="btn btn-primary btn-submit btn-action">Simpan</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop