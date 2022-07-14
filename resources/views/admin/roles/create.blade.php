@extends('layout.admin')
@section('title', 'Create New Role')


@section('bread')

    <ol class="breadcrumb float-sm-right">

        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Role</li>
    </ol>

@endsection

@section('content')

    @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $er)
                    <li>{{ $er->name }}</li>
                @endforeach

            </ul>
        </div>

    @endif





    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Role Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}">

            @if ($errors->has('name'))
                <ul>
                    <li>{{ $errors->first('name') }}</li>
                </ul>
            @endif

        </div>


        <div class="form-group">

            @foreach (config('abilities') as $key=>$value )


            <div class="form-check">
                <input class="form-check-input" type="checkbox" value=" {{$key}}" name="abilities[]" >
                <label class="form-check-label" >
                    {{$value}}
                </label>
            </div>
             @endforeach
        </div>



        <div class="form-group">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>







    </form>


@endsection
