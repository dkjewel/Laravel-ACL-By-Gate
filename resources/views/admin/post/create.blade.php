@extends('admin.app')

@section('title')
    Add Post
@endsection

@section('content')

    <div class="card card-info" style="height: auto; width: 1000px; margin-left: 50px;margin-top: 60px">

        <!-- Card Header-->
        <div class="card-header row">
            <h1 class="card-title text-center col-8" style="margin-left: 130px">Add Post</h1>
        </div>

        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>

        <!-- Card Body-->
        <form action="{{route('post.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
            {{ csrf_field() }}

            <div class="card-body">

                <div class="form-group ml-5 row">
                    <label class="col-sm-3 control-label">Post Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('title') ? $errors->first('title'):''}} </span>

                    </div>
                </div>


                <div class="form-group ml-5 row">
                    <label class="col-sm-3 control-label">Post Body</label>
                    <div class="col-sm-9">
                        <textarea name="body"  class="form-control"></textarea>
                        <span class="text-danger"> {{$errors->has('body') ? $errors->first('body'):''}} </span>

                    </div>
                </div>


            </div>

            <!-- Card Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-info" style="margin-left: 400px">Add Post</button>
            </div>

        </form>

    </div>

@endsection
