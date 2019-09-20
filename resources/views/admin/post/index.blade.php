@extends('admin.app')

@section('title')
    Manage Post
@endsection

@section('content')


    <div class="card card-info mt-5" style="height: auto; width: 1000px; margin-left: 60px">

        <div class="card-header row">
            <h1 class="card-title text-center col-9" style="margin-left: 90px">Manage Post</h1>
        </div>


        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>


        <!-- Card Body-->
        <div class="card-body table-responsive p-0 text-center">


            <table class="table table-bordered text-center">
                <thead>

                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Body</th>
                    @canany(['isAdmin', 'isAuthor'])
                    <th>Action</th>
                    @endcanany
                </tr>

                </thead>

                <tbody>

                @if($posts->count()>0)
                    @php($i=1)
                    @foreach($posts as $post)
                        <tr>

                            <td>{{$i++}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{str_limit($post->body,20)}}</td>

                            <td>

                                <div class="row">

                                    @canany(['isAdmin', 'isAuthor'])
                                    <div class="col-sm-8" style="margin-top: 3px">
                                        <a href="{{route('post.edit',$post->id)}}"
                                           class="fa fa-edit btn btn-info"></a>
                                    </div>
                                    @endcanany

                                    @can('isAdmin')
                                        <div class="col-sm-4" style="margin-left: -20px">
                                            <form action="{{route('post.destroy',$post->id)}}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                @method('DELETE')

                                                <button type="submit" class="fa fa-trash btn btn-danger"></button>

                                            </form>
                                        </div>
                                    @endcan


                                </div>


                            </td>


                        </tr>
                    @endforeach
                @else
                    <h4 class="alert-warning text-center">No Data Available</h4>
                @endif

                </tbody>

            </table>


            <div style="margin-left: 430px">
                {{ $posts->links() }}
            </div>

            <div style="margin-left: 430px">

            </div>

        </div>


    </div>

@endsection
