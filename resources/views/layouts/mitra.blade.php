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
                                                <th width=5%>ID</th>
                                                <th>Nama</th>
                                                <th width=>Logo Mitra</th>
                                                <th width=15%>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($Mitra as $key)
                                            <tr>
                                                <td>{{$key->id}}</td>
                                                <td>{{$key->nama}}</td>
                                                <td><img class="text-center" src="{{ url('/images/'.$key->images) }}"
                                                        width="90ox"></td>
                                                <td>
                                                    <div class="btn-group">

                                                        {{ Form::open(array('route' => ['mitra.edit',$key->id],'method'=>'get','role' => 'form', 'id' => 'my_form')) }}
                                                        <button class="btn btn-sm btn-edit btn-warning"
                                                            href="">Edit</button>
                                                        {{ Form::close()}}
                                                        {{ Form::open(array('route' => ['mitra.destroy',$key->id],'method'=>'delete','role' => 'form', 'id' => 'my_form')) }}
                                                        <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin Ingin Menghapus?')"
                                                            type="submit">Hapus</button>
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