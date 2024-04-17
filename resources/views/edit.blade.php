@extends('layouts.master')

@section('content')

<div class="main-content mt-3">
  @if ($errors->any())
  @foreach ($errors->all() as $error )
  <div class="alert alert-danger">{{$error}}</div>
  @endforeach
  @endif
  <div class="d-flex justify-content-end  mt-2">
    <a href="{{route('posts.index')}}" class="btn btn-info mx-1">Back</a>
  </div>
  <div class="card mt-4">
    <div class="card-header">
      Create Post
    </div>

    <div class="card-body">
      <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <div>
            <img src="{{asset($post->image)}}" alt="" width="150" class="mb-3">
          </div>
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" value="{{$post->title}}" />
        </div>
        <div class="form-group">
          <label for="category" class="form-label">Category</label>
          <select id="" name="category" class="form-control">
            <option value="">Select</option>
            @foreach ($categories as $category )
            <option {{$category->id == $post->category_id ? 'selected' : ''}}
              value="{{$category->id}}">{{$category->name}}</option>
            @endforeach


          </select>
        </div>
        <div class="form-group">
          <label for="" class="form-label">Description</label>
          <textarea name="description" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
        </div>


        <div class="form-group mt-3">
          <input type="submit" class="btn btn-primary" value="Create">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection