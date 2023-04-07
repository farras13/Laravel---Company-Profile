@extends('template-admin')
@section('title')
    Pages
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pages Create</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 400px;">
            <form action="{{ url('page/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Section Pages</label>
                        <input type="text" class="form-control" id="inputSection" name="section" placeholder="Enter Section Pages">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title Pages</label>
                        <input type="text" class="form-control" id="inputtitle" name="title" placeholder="Enter Title Pages">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" rows="3" name="desc" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="images" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
