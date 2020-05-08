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
                {!! Form::open(array('route' => ['dokumentasi.update',$dokumentasi->id],'method'=>'PATCH','role' =>
                'form','autocomplete'=>'off', 'id' => 'my_form','enctype'=>"multipart/form-data")) !!}
                <div class="form-group row">
                    <label for="nama" class="col-2 col-form-label">Nama</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$dokumentasi->title}}" name="title" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kepanjangan" class="col-2 col-form-label">Deskripsi</label>
                    <div class="col-10">
                    <textarea class="form-control" name="deskripsi" rows="3">{{$dokumentasi->deskripsi}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Content</label>
                    <div class="col-10">
                        <textarea class="form-control" id="my-editor"  name="content" rows="6">{{$dokumentasi->content}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomor" class="col-2 col-form-label">Tanggal</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$dokumentasi->tanggal}}" name="tanggal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Gambar Dokumentasi</label>
                    <div class="col-6">
                        <img src="https://afanlogamlestari.co.id/images/{{$dokumentasi->images}}" width="100%" height="250">
                        
                        <input class="form-control" type="file" value="" name="images">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Gambar Media</label>
                    <div class="col-6">
                       
                        <div class="input-group control-group increment">
                            <input type="file" name="filename[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button"><i
                                        class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                        </div>
                        <div class="clone d-none">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button"><i
                                            class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                        </div>
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

@section("js")
<script type="text/javascript">
$(document).ready(function() {
    $(".btn-success").click(function() {
        var html = $(".clone").html();
        $(".increment").after(html);
    });
    $("body").on("click", ".btn-danger", function() {
        $(this).parents(".control-group").remove();
    });

});
</script>

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