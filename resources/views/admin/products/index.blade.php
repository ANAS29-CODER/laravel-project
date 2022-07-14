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
        <h2> {{ $title }} <a href="{{ route('products.create') }}">{{ __("Create")}}</a></h2>

            @php

            $url=$_SERVER['PHP_SELF'];
           if(!stripos($url,'trash')){
             @endphp

                <a href="{{ route('products.trash') }}" class="btn  btn-success ml-auto mb-sm-2">Trash Products</a>
           @php
           }else {
             @endphp

          <a href="{{ route('products.index') }}" class="btn  btn-success ml-auto mb-sm-2"> Products</a>
           @php
        }
           @endphp



    </div>
    <ul>

</ul>
    <table class="table">
        <thead>
            <tr>Image
                <th>{{__("Image")}} </th>
                <th>{{__("Id")}} </th>
                <th>{{__("Name")}} </th>
                <th>{{__("Category")}}</th>
                <th>{{__("Parent_Id")}}</th>
                <th>{{__("Status")}}</th>

                <th>{{__("Price")}}</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $pro)
                <tr>
                    <td><img src=" {{ $pro->image_url }} " width="60" alt=""></td>
                    <td>{{ $pro->id }}</td>
                    <td> {{ $pro->name }} </td>
                    <td> {{ $pro->category_name }} </td>
                    <td> {{ $pro->category_id }} </td>
                    <td> {{ $pro->status }} </td>

                    <td> {{ $pro->price }} </td>
                    <td><a href="{{ route('products.edit', $pro->id) }}" class="btn btn-sm btn-dark">{{__("Edit")}}</a></td>

                    <td>
                        <form method="POST" action="{{ route('products.destroy', $pro->id) }}">

                            @method('delete')
                            @csrf
                            <input type="hidden" name="_method" value="DELETE ">


                            <button type="submit" class="btn btn-sm btn-danger">{{__("Delete")}}</button>

                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @php

    /*
            <p> {{ $products->currentPage() }}</p>
            <p> {{ $products->hasMorePages() }}</p>

            <p> {{ $products->perPage() }}</p>
            <p> {{ $products->count() }}</p>
            <p> {{ $products->firstItem() }}</p>
            <p> {{ $products->lastItem() }}</p>*/
    @endphp
    {{ $products->links() }}
@endsection
