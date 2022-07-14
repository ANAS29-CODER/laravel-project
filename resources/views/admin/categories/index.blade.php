@extends('layout.admin')
@section('title', 'first view index page')


@section('content')

<x-alert/>

 @if ($errors->any())

        <div>
            <ul>
                @foreach ($errors as $er )
                <li>{{$er}}</li>
        @endforeach

            </ul>
        </div>

 @endif




    <h2> {{ $title }} <a href="{{ route('categories.create') }}">create</a></h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID   </th>
                <th>NAME  </th>
                <th>SLUG</th>
                <th>PARENT_ID</th>

              <th>STATUS</th>
              <th>products count</th>
                <th>CRATED AT</th>
                <th>UPFATED AT</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td> {{ $c->name }} </td>
                    <td> {{ $c->slug }} </td>
                    <td> {{ $c->parent_id }} </td>
                    <td> {{ $c->products[0]->name }} </td>
                    <td>{{$c->count}}</td>

                    <td> {{ $c->created_at->format('d / m /Y') }} </td>
                    <td> {{ $c->updated_at }} </td>
                    <td><a href="{{ route('categories.edit', $c->id) }}" class="btn btn-sm btn-dark">Edit</a></td>

                    <td>
                        <form method="POST" action="{{ route('categories.destroy', ['id' => $c->id]) }}">

                            @method('delete')
                            @csrf
                            <input type="hidden" name="_method" value="DELETE ">


                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
