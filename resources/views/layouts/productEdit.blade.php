@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Produk</h1>
@stop

@section('content')
<div class="row">
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

    <div class="col-md-12">
        <div class="box-body">
            {!! Form::open(array('route' => ['product.update',$product->id],'method'=>'PATCH','role' =>
            'form','autocomplete'=>'off', 'id' => 'my_form','enctype'=>"multipart/form-data")) !!}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body ">
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Nama</label>
                            <div class="col-10">
                                <input class="form-control" type="search" value="{{$product->nama}}" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Deskripsi</label>
                            <div class="col-10">
                                <input class="form-control" type="search" value="{{$product->deskripsi}}"
                                    name="deskripsi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input"  class="col-2 col-form-label">Keterangan</label>
                            <div class="col-10">
                                <textarea class="form-control" id="my-editor" name="keterangan"
                                    rows="6">{!!$product->keterangan!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Icon Produk</label>
                            <div class="col-6">
                                <input class="form-control" type="file" value="" name="images">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Gambar Produk</label>
                            <div class="col-6">
                            <input class="form-control" type="file" value="" name="imagesproduct">
                            </div>
                        </div>
                        <button type="submit" id="saveBtn" value="create"
                            class="btn btn-primary btn-submit btn-action">Simpan</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('js')

<script>
var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    
};
</script>
<script>
CKEDITOR.replace('my-editor', options);
</script>
@stop