@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Edit General Setting</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
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
                {!! Form::open(array('route' => ['general.update',$general->id],'method'=>'PATCH','role' =>
                'form','autocomplete'=>'off', 'id' => 'my_form','enctype'=>"multipart/form-data")) !!}
                <!-- /.box-body -->
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">ID</label>
                    <div class="col-10">
                        <input class="form-control" type="search" value="{{$general->id}}" name="id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Key</label>
                    <div class="col-10">
                        <input class="form-control" type="search" value="{{$general->key}}" name="key">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Isi</label>
                    <div class="col-10">
                        <input class="form-control" type="search" value="{{$general->value}}" name="value">
                    </div>
                    <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Flag</label>
                    <div class="col-10">
                        <input class="form-control" type="search" value="{{$general->flag}}" name="flag">
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