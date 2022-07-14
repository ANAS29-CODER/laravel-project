@extends('layout.admin')
@section('title', 'Create New Category')


@section('bread')

 <ol class="breadcrumb float-sm-right">

      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Categories</li>
 </ol>

 @endsection

 @section('content')

 @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $er )
                <li>{{$er}}</li>
                @endforeach

            </ul>
        </div>

 @endif





<form action="{{route('categories.store')}}"  method="POST">
    @csrf

    <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid

        @enderror" value="{{old('name')}}">

        @if ($errors->has('name'))
        <ul>
            <li>{{$errors->first('name')}}</li>
        </ul>

        @endif

    </div>

    <div class="form-group">
        <label for="">Parent</label>
        <select name="parent_id" id="parent_id" class="form-control">
            <option value="">No Parent</option>
            @foreach ( $parents as $parent )

            <option value="{{$parent->id}}">{{$parent->name}}</option>



            @endforeach
        </select>

         @if ($errors->has('parent_id'))
        <ul class="alert alert-danger mr-h-2">
            <li>{{$errors->first('parent_id')}}</li>
        </ul>

        @endif

    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid

        @enderror">{{old('description')}}</textarea>

         @if ($errors->has('description'))
        <ul class="alert alert-danger mr-h-2">
            <li>{{$errors->first('description')}}</li>
        </ul>

        @endif

    </div>

      <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control">

         @if ($errors->has('image'))
        <ul class="alert alert-danger mr-h-2">
            <li>{{$errors->first('image')}}</li>
        </ul>

        @endif

    </div>

    <div class="form-group">

       <button type="submit" class="btn btn-primary">Submit</button>

    </div>







</form>


    @endsection
