@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Perijinan</h1>
@stop

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Data Perijinan</p>
                   
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
                                                <th width=5%>Nama</th>
                                                <th width=25%>Kepanjangan</th>
                                                <th width=20%>Nomor</th>
                                                <th width=15%>Created At</th>
                                                <th width=15%>Update At</th>
                                                <th width=15%>Actions</th> 
                                            </tr>
                                        </thead>

                                        <tbody>  
                                        @foreach($Perijinan as $key)
                                        <tr>
                                            <td>{{$key->id}}</td>
                                            <td>{{$key->nama}}</td>
                                            <td>{{$key->kepanjangan}}</td>
                                            <td>{{$key->nomor}}</td>
                                            <td>{{$key->created_at}}</td>
                                            <td>{{$key->update_at}}</td>
                                            <td>
                                                <a href="#">Delete</a> |
                                                <a href="{{ route('perijinanEdit') }}">Update</a>
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
                                    <a class="nav-link" href="{{ route('perijinanCreate') }}"><input type="submit" class="btn btn-primary" value="Tambah Data"></a>
                </div>
            </div>
        </div>
    </div>
@stop
