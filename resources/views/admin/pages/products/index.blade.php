@extends('admin.layouts.master')


@section('content')
    <div class="row mb-3 pt-3">
            <div class="col-sm-6 text-left">
                <h2>Products</h2>
            </div>
            <div class="col-sm-6 text-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th style="width:40%;">Title</th>
            <th>Details</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>
                {{ $product->name }}


                <div class="action-btn">
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a href="{{ route('products.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a  href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit">Trash</button>
                    @endcan
                </form>
	        </div>

            </td>
	        <td>{{ $product->detail }}</td>
	        
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}


@endsection