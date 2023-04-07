@extends('template-admin')
@section('title')
    Fitur
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Fitur Table</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="{{ route('fitur.create') }}" class="btn btn-primary">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($fitur) == 0)
                        <tr>
                            <td colspan="6" class="text-center"> Data anda kosong </td>
                        </tr>
                    @endif
                    @foreach ($fitur as $pk => $p)
                        <tr>
                            <td>{{ $pk + 1 }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ strlen($p->desc) > 100 ? substr($p->desc,0,100)."..." : $p->desc;  }}</td>
                            <td><img src="{{ asset('fitur') . '/' . $p->images }}" alt="" srcset=""
                                width="120px"></td>
                            <td>
                                <a href="{{ url('feature/edit').'/'.$p->id }}"> <i class="fa fa-pen"></i> </a>
                                <a href="{{ url('feature/delete').'/'.$p->id }}"> <i class="fa fa-eraser"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
