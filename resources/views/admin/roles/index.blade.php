@extends('layout.admin')
@section('title', 'first view index page')


@section('content')

    @if (!empty($success))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

    @if ($errors->any())

        <div>
            <ul>
                @foreach ($errors as $er)
                    <li>{{ $er }}</li>
                @endforeach

            </ul>
        </div>

    @endif





    <div class="d-flex">
       @can('roles.create')
        <h2> {{ $title }} <a href="{{ route('roles.create') }}">create</a></h2>
        @endcan

    </div>



    <table class="table">
        <thead>
            <tr>


                <th>NAME </th>

                <th>CREATED_AT</th>
                <th></th>
                 <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>


                    <td> {{ $role->name }} </td>
                    <td> {{ $role->created_at }} </td>


                     <td>

                          @can('roles.update')  <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-dark">Edit</a>
                        @endcan

                        </td>




                    <td>
                        @can('roles.delete')
                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}">

                            @method('delete')
                            @csrf
                            <input type="hidden" name="_method" value="DELETE ">


                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                        </form>
                         @endcan

                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
    @php

    /*
            <p> {{ $roles->currentPage() }}</p>
            <p> {{ $roles->hasMorePages() }}</p>

            <p> {{ $roles->perPage() }}</p>
            <p> {{ $roles->count() }}</p>
            <p> {{ $roles->firstItem() }}</p>
            <p> {{ $roles->lastItem() }}</p>*/
    @endphp
    {{ $roles->links() }}
@endsection
