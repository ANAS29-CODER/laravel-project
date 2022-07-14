@extends('layout.admin')
@section('title', 'Edit Category')


@section('bread')

 <ol class="breadcrumb float-sm-right">

      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Edit</li>
 </ol>

 @endsection

 @section('content')




<form action="{{route('categories.update', $category->id)}}"  method="POST">

    @method('put')
    @csrf

    <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}">

    </div>

    <div class="form-group">
        <label for="">Parent</label>
        <select name="parent_id" id="parent_id" class="form-control">
            <option value="">No Parent</option>
            @foreach ( $parents as $parent )

            <option value="{{$parent->id}}" @if($parent->id == $category->parent_id) selected @endif>{{$parent->name}}</option>



            @endforeach
        </select>

    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" class="form-control">{{$category->description}}</textarea>

    </div>

      <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control">

    </div>

    <div class="form-group">
        <label for="status">Status </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="active" id="status-active" @if($category->status == 'active') checked @endif >
                <label class="form-check-label" for="flexCheckDisabled">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="draft" id="status-draft"  @if($category->status == 'draft') checked @endif >
                <label class="form-check-label" for="flexCheckCheckedDisabled">
                    Draft
                </label>
            </div>

    </div>

    <div class="form-group">

       <button type="submit" class="btn btn-primary">edit</button>

    </div>







</form>


    @endsection
