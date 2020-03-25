@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dokumentasi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">gio Page</p>
                    <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Hover Data Table</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width=40%>Slogan1 </th>
                                                <th width=40%>Slogan2</th>
                                                <th width=2                                                                                                         0%>Actions</th> 
                                            </tr>
                                        </thead>

                                        <tbody>  
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="#">Delete</a> |
                                                <a href="#">Update</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                        

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                </div>
            </div>
        </div>
    </div>
@stop
