@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-end  mt-5">
  <a href="{{route('posts.create')}}" class="btn btn-info mx-1">Create</a>
  <a href="{{route('posts.trashed')}}" class="btn btn-primary mx-1">Trashed</a>
</div>
<div class="card mt-4">
  <div class="card-header">
    All Posts
  </div>

  <div class="card-body table-responsive-sm">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Title</th>
          <th>Description</th>
          <th>Category</th>
          <th>Publish Date</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td>
             <img src="{{asset($post->image)}}"alt="" width="100"/>
          </td>
          <td>{{$post->title}}</td>
          <td>{{$post->description}}</td>
          <td>{{$post->category->name}}</td>
          <td>{{$post->created_at->diffForHumans()}}</td>
          <td>
             <div class="d-flex">
              <a href="{{route('posts.show',$post->id)}}" class="btn btn-warning mx-2">Show</a>
              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success mx-2">Edit</a>
             {{--  <a href="" class="btn btn-danger">Delete</a> --}}
             <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                 @csrf
                 @method('DELETE')
  
                 <button class="btn-sm btn-danger mx-2">Delete</button>
             </form>
             </div>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>

    <div class="d-flex justify-content-center">{{$posts->links()}}<div>
  </div>
</div>
@endsection