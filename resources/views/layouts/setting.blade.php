@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">General Setting</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- Table -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">


                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width=5%>ID</th>
                                                <th width=10%>Name</th>
                                                <th width=65%>Value</th>
                                                <th width=10%>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($General as $key)
                                            <tr>
                                                <td>{{$key->id}}</td>
                                                <td>{{$key->flag}}</td>
                                                <td>{{$key->value}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-sm btn-edit btn-warning btnEdit"
                                                            data-link="{{ route('setting.update',$key->id)}}"
                                                            data-key="{{$key->key}}" data-value="{{$key->value}}"
                                                            data-flag="{{$key->flag}}" data-toggle="modal"
                                                            data-target="#modal-default">Edit</button>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
                <!-- End Table -->
            </div>
            <div class="modal fade in" id="modal-default" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('method'=>'PATCH','role' =>
                            'form','autocomplete'=>'off', 'id' => 'my_form','enctype'=>"multipart/form-data")) !!}
                            <div class="form-group ">
                                <label for="example-search-input" class="col-6 col-form-label labelData">Key</label>
                                <input class="form-control inputData" type="text" value="" name="value">
                                <input class="form-control keyData" type="hidden" value="" name="key">
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary saveBtn">Simpan</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
</div>

@stop
@section('js')
<script>
$(document).ready(function() {

    $('body').on('click', '.btnEdit', function(elemen) {
        event.preventDefault();
        showModal(($(this)));
    });

    function showModal(el) {
        console.log(el.attr("data-value"))
        $('#my_form').attr('action', el.attr("data-link"));
        $('.modal-title').text(el.attr("data-flag"));
        $(".labelData").html(el.attr("data-flag"));
        $(".inputData").val(el.attr("data-value"));
        
        $(".keyData").val(el.attr("data-key"));
        $('.modal').modal('show');
    }
});
$('body').on('click', '.saveBtn', function(e) {
    e.preventDefault();
    $(this).html('Sending..');
    $(".saveBtn").attr("disabled", true);
    $.ajax({
        data: $('#my_form').serialize(),
        url: $('#my_form').attr("action"),
        type: $('#my_form').attr("method"),
        dataType: 'json',
        success: function(data) {
            location.reload();

        },
        error: function(data) {
          alert("update Gagal")
        }
    });
    $("#btnSubmit").attr("disabled", false);
});
</script>
@stop