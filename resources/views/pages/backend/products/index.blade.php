@extends('layouts.backend', ['activePage' => 'products', 'titlePage' => __('Products')])

@push('style')
    <style>
        .btn-action-delete {
            color: #9c27b0;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Products') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage products.') }}</p>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('backend.products.create') }}"
                                       class="btn btn-sm btn-primary" title="{{ __('Add product') }}"><i
                                                class="material-icons">add</i>&nbsp;{{ __('Add product') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('#') }}
                                    </th>
                                    <th>
                                        {{ __('Image') }}
                                    </th>
                                    <th>
                                        {{ __('Name') }}
                                    </th>
                                    <th>
                                        {{ __('Category') }}
                                    </th>
                                    <th>
                                        {{ __('Price') }}
                                    </th>
                                    <th>
                                        {{ __('Slug') }}
                                    </th>
                                    <th>
                                        {{ __('Status') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @if($products->count() != 0)
                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->id }}
                                                </td>
                                                <td>
                                                    --
                                                </td>
                                                <td>
                                                    {{ $product->name }}
                                                </td>
                                                <td>
                                                    {{ $product->category_id }}
                                                </td>
                                                <td>
                                                    {{ $product->promotion_price == 0 ? $product->unit_price : $product->promotion_price }}
                                                </td>
                                                <td>
                                                    {{ $product->slug }}
                                                </td>
                                                <td>
                                                    {{ $product->status == 1 ? 'Enabled' : 'Disabled' }}
                                                </td>
                                                <td class="row justify-content-end w-100 m-0">
                                                    <a href="{{ route('backend.products.edit', $product->id) }}"><i class="material-icons">edit</i></a>
                                                    <form action="{{ route('backend.products.destroy', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="border-0 bg-transparent cursor-pointer btn-action-delete"
                                                                onclick="return confirm('Are you sure？')"><i
                                                                    class="material-icons">delete</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center">{{ __('No record') }}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
