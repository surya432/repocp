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
                                                <th width=10%>Key</th>
                                                <th width=65%>Value</th>
                                                <th width=10%>Flag</th>
                                                <th width=10%>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($General as $key)
                                            <tr>
                                                <td>{{$key->id}}</td>
                                                <td>{{$key->key}}</td>
                                                <td>{{$key->value}}</td>
                                                <td>{{$key->flag}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                    {{ Form::open(array('route' => ['setting.edit',$key->id],'method'=>'get','role' => 'form', 'id' => 'my_form')) }}
                                                        <button class="btn btn-sm btn-edit btn-warning"
                                                            href="">Edit</button>
                                                        {{ Form::close()}}
                                                       
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
        </div>
    </div>
</div>
@stop