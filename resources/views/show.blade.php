@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-end  mt-5">
  <a href="{{route('posts.create')}}" class="btn btn-info mx-1">Create</a>
  <a href="" class="btn btn-primary mx-1">Trashed</a>
</div>
<div class="card mt-4">
  <div class="card-header">
      {{$post->title}}
  </div>

  <div class="card-body">
    <table class="table table-striped">
      <tbody>
         <tr>
            <td>Id</td>
            <td>{{$post->id}}</td>
         </tr>
         <tr>
            <td>Image</td>
            <td>
                <img src="{{asset($post->image)}}" alt="" width="150"/>
            </td>
         </tr>
         <tr>
            <td>Title</td>
            <td>{{$post->title}}</td>
         </tr>
         <tr>
            <td>Description</td>
            <td>{{$post->description}}</td>
         </tr>
         <tr>
            <td>Category</td>
            <td>{{$post->category_id}}</td>
         </tr>
         <tr>
            <td>Published Date</td>
            <td>{{date('Y-m-d',strtotime('10 Semptember 2000'))}}</td>
         </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection