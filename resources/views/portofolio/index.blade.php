@extends('template-admin')
@section('title')
    Portofolio
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Portofolio Table</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="{{ route('portofolio.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-hover table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Desc</th>
                        <th>images</th>
                        <th>Tags</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($porto) == 0)
                        <tr>
                            <td colspan="5" class="text-center"> Data anda kosong </td>
                        </tr>
                    @endif
                    @foreach ($porto as $pk => $p)
                        <tr>
                            <td>{{ $pk + 1 }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ strlen($p->desc) > 80 ? substr($p->desc, 0, 80) . '...' : $p->desc }}</td>
                            <td><img src="{{ asset('portofolio') . '/' . $p->images }}" alt="" srcset=""
                                    width="120px"></td>
                            <td>{{ $p->tags }}</td>
                            <td>
                                <a href="{{ url('portofolio/edit') . '/' . $p->id }}"> <i class="fa fa-pen"></i> </a>
                                <a href="{{ url('portofolio/delete') . '/' . $p->id }}"> <i class="fa fa-eraser"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
