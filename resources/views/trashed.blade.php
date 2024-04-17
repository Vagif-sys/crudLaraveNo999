@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-end  mt-5">
  <a href="{{route('posts.index')}}" class="btn btn-info mx-1">Back</a>
</div>
<div class="card mt-4">
  <div class="card-header">
    Trashed Posts
  </div>

  <div class="card-body">
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
            <img src="{{asset($post->image)}}" alt="" width="100" />
          </td>
          <td>{{$post->title}}</td>
          <td>{{$post->description}}</td>
          <td>{{$post->category_id}}</td>
          <td>{{$post->created_at->diffForHumans()}}</td>
          <td>
            <div class="d-flex mx-2">
              <a href="{{route('posts.restore',$post->id)}}" class="btn btn-success">Restore</a>
              <form action="{{route('posts.force_delete',$post->id)}}" method="POST">
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
  </div>
</div>
@endsection