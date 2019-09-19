@extends('admin.app')

@section('title')
    Update Post
@endsection

@section('content')

    <div class="card card-info" style="height: auto; width: 1000px; margin-left: 50px;margin-top: 60px">

        <!-- Card Header-->
        <div class="card-header ">
            <h3 class="card-title text-center">Update Post</h3>
        </div>

        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>

        <!-- Card Body-->
        <form action="{{route('post.update',$post->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method("PATCH")

            <div class="card-body">

                <div class="form-group ml-5 row">
                    <label class="col-sm-3 control-label">Post Title</label>
                    <div class="col-sm-9">
                        <input value="{{$post->title}}" type="text" name="title" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('title') ? $errors->first('title'):''}} </span>

                    </div>
                </div>


                <div class="form-group ml-5 row">
                    <label class="col-sm-3 control-label">Post Body</label>
                    <div class="col-sm-9">
                        <textarea name="body"  class="form-control">{{$post->body}}</textarea>
                        <span class="text-danger"> {{$errors->has('body') ? $errors->first('body'):''}} </span>

                    </div>
                </div>


            </div>

            <!-- Card Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-info" style="margin-left: 400px">Update Post Info</button>
            </div>
            <a href="{{route('post.index')}}" class="btn" style="margin-left: 455px;background-color: #841b0f; color: #eaf3ce" >Return</a>

        </form>

    </div>

@endsection
