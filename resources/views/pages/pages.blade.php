@extends('template-admin')
@section('title')
    Pages
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Fixed Header Table</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="{{ route('pages.create') }}" class="btn btn-primary">
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
                        <th>Section</th>
                        <th>Title</th>
                        <th>Desc</th>
                        <th>images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($pages) == 0)
                        <tr>
                            <td colspan="6" class="text-center"> Data anda kosong </td>
                        </tr>
                    @endif
                    @foreach ($pages as $pk => $p)
                        <tr>
                            <td>{{ $pk + 1 }}</td>
                            <td>{{ $p->section }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ strlen($p->desc) > 80 ? substr($p->desc,0,80)."..." : $p->desc;  }}</td>
                            <td><img src="{{ asset('pages'.'/'.$p->images) }}" alt="" srcset="" width="120px"></td>
                            <td>
                                <a href="{{ url('page/edit').'/'.$p->id }}"> <i class="fa fa-pen"></i> </a>
                                <a href="{{ url('page/delete').'/'.$p->id }}"> <i class="fa fa-eraser"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
