@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Mitra Page</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Mitra Data</p>
                   
                   <!-- Table -->
                 <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                               
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width=10%>ID</th>
                                                <th width=20%>Nama</th>
                                                <th width=15%>Images</th>
                                                <th width=20%>Created Up</th>
                                                <th width=20%>Update Up</th>
                                                <th width=25%>Actions</th> 
                                            </tr>
                                        </thead>

                                        <tbody>  
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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

                </section><!-- /.content -->
                                    <!-- End Table -->

                </div>
            </div>
        </div>
    </div>
@stop
