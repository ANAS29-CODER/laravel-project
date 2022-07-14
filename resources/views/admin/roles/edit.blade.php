@extends('layout.admin')
@section('title', 'Edit role')


@section('bread')

    <ol class="breadcrumb float-sm-right">

        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

@endsection

@section('content')




    <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">

        @method('put')
        @csrf

        <div class="form-group">
            <label for="">role Name</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}">

        </div>



          <div class="form-group">

            @foreach (config('abilities') as $key=>$value )


            <div class="form-check">
                <input class="form-check-input" type="checkbox" value=" {{$key}}" name="abilities[]"
                @if (in_array($key , $role->abilities ??[]))
                 checked
                @endif >
                <label class="form-check-label" >
                    {{$value}}
                </label>
            </div>
             @endforeach
        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary">edit</button>

        </div>







    </form>


@endsection
