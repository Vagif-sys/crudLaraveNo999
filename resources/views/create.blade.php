@extends('layouts.master')

@section('content')

<div class="main-content mt-3">
@if ($errors->any())
  @foreach ($errors->all() as $error )
      <div class="alert alert-danger">{{$error}}</div>
  @endforeach
@endif

<div class=" d-flex justify-content-end  mt-2">

  <a href="{{route('posts.index')}}" class="btn btn-info mx-1">Back</a>
</div>
</div>
<div class="card mt-4">
  <div class="card-header">
    Create Post
  </div>

  <div class="card-body">
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
      </div>
      <div class="form-group">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title">
      </div>

      <div class="form-group">
        <label for="category" class="form-label">Category</label>
        <select id="" name="category" class="form-control">
             <option value="">Select</option>
             @foreach ($categories as $category )
                  <option value="{{$category->id}}">{{$category->name}}</option>
             @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" cols="30" rows="10" class="form-control" style="height: 150px;"></textarea>
      </div>


      <div class="form-group mt-3">
          <button class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
</div>
@endsection