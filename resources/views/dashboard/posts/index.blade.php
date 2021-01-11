@extends('dashboard.layout')
@section('content')
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New Post</a>

        </div>

    </div>
    @if(!$posts->isEmpty())


        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>thumbnail</th>
                    <th>content</th>
                    <th>Users</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>

                    <th>Action</th>
                </tr>
                </thead>

                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>

                        <td> <img src="{{asset('images/blog/'.$post->thumbnail)}}" width="100" height="100" > </td>
                        <td>{{$post->content}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>


                                <div class="btn-group" category="group" aria-label="Basic example">
                                    <a href="{{route('posts.show',$post->id)}}" type="button" class="btn btn-link">Show</a>
                                    @can("isAllow", $post->user->id)
                                    <form method="post" action="{{route('posts.destroy',$post->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-link">Delete</button>
                                    </form>
                                    <a href="{{route('posts.edit',$post->id)}}" type="button" class="btn btn-link">Edit</a>
                                    @endcan
                                </div>


                        </td>



                        {{--<td>--}}
                            {{--@can("isAllow", collect(['admin','subscriber']))--}}

                            {{--<div class="btn-group" category="group" aria-label="Basic example">--}}
                                {{--<a href="{{route('categories.show',$post->id)}}" type="button" class="btn btn-link">Show</a>--}}
                                {{--<form method="post" action="{{route('categories.destroy',$post->id)}}">--}}
                                    {{--@method('DELETE')--}}
                                    {{--@csrf--}}
                                    {{--<button type="submit" class="btn btn-link">Delete</button>--}}
                                {{--</form>--}}
                                {{--<a href="{{route('categories.edit',$post->id)}}" type="button" class="btn btn-link">Edit</a>--}}
                            {{--</div>--}}
                                {{--@endcan--}}

                        {{--</td>--}}


                    </tr>
                @endforeach
                <tbody>

                </tbody>
            </table>
        </div>
    @else
        <p class="alert alert-info">No categories Record Found</p>
    @endif
@endsection