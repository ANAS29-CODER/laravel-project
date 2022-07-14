@extends('layout.admin')
@section('title', 'Edit product')


@section('bread')

    <ol class="breadcrumb float-sm-right">

        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

@endsection

@section('content')




    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

        @method('put')
        @csrf

        <div class="form-group">
            <label for="">product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">

        </div>

        <div class="form-group">
            <label for="">Parent</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">No Parent</option>
                @foreach ($category as $parent)
                    <option value="{{ $parent->id }}" @if ($parent->id == $product->category_id) selected @endif>
                        {{ $parent->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>

        </div>

        <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">

        </div>

        <div class="form-group">
            <label for="status">Status </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="active" id="status-active"
                    @if ($product->status == 'active') checked @endif>
                <label class="form-check-label" for="flexCheckDisabled">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="draft" id="status-draft"
                    @if ($product->status == 'draft') checked @endif>
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
