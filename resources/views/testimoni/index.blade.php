@extends('template-admin')
@section('title')
    Testimoni
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Testimoni Table</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="{{ route('testi.create') }}" class="btn btn-primary">
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
                        <th>Name </th>
                        <th>Job </th>
                        <th>Testimoni</th>
                        <th>images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($porto) == 0)
                        <tr>
                            <td colspan="6" class="text-center"> Data anda kosong </td>
                        </tr>
                    @endif
                    @foreach ($porto as $pk => $p)
                        <tr>
                            <td>{{ $pk + 1 }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->job }}</td>
                            <td>{{ strlen($p->desc) > 80 ? substr($p->desc,0,80)."..." : $p->desc;  }}</td>
                            <td><img src="{{ asset('testi').'/'.$p->images }}" alt="" srcset="" width="120px"></td>
                            <td>
                                <a href="{{ url('testimoni/edit').'/'.$p->id }}"> <i class="fa fa-pen"></i> </a>
                                <a href="{{ url('testimoni/delete').'/'.$p->id }}"> <i class="fa fa-eraser"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
