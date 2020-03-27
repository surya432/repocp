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
                <p class="mb-0">Data Mitra</p>

                <!-- Table -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                            <a class="btn btn-primary btn-sm" href="{{ route('mitra.create') }}">Tambah
                                    Perijinan</a>
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width=10%>ID</th>
                                                <th width=20%>Nama</th>
                                                <th width=15%>Images</th>
                                                <th width=25%>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($Mitra as $key)
                                            <tr>
                                                <td>{{$key->id}}</td>
                                                <td>{{$key->nama}}</td>
                                                <td>{{$key->update_at}}</td>
                                                <td>
                                                    <a href="#">Delete</a> |
                                                    <a href="{{ route('mitra.edit') }}">Update</a>
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