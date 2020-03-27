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
                                <a class="btn btn-primary btn-sm" href="{{ route('perijinan.create') }}">Tambah
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
                                                <th width=5%>Nama</th>
                                                <th width=25%>Kepanjangan</th>
                                                <th width=20%>Nomor</th>
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
                                                <td>
                                                    <div class="btn-group">

                                                        {{ Form::open(array('route' => ['perijinan.edit',$key->id],'method'=>'get','role' => 'form', 'id' => 'my_form')) }}
                                                        <button class="btn btn-sm btn-edit btn-warning"
                                                            href="">Edit</button>
                                                        {{ Form::close()}}
                                                        {{ Form::open(array('route' => ['perijinan.destroy',$key->id],'method'=>'delete','role' => 'form', 'id' => 'my_form')) }}
                                                        <button class="btn btn-sm btn-danger"
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
@section('js')
<script>
console.log('Hi!');
</script>
@stop