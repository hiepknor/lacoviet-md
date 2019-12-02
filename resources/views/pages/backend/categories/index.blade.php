@extends('layouts.backend', ['activePage' => 'categories', 'titlePage' => __('Categories')])

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
                            <h4 class="card-title ">{{ __('Categories') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage categories') }}</p>
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
                                    <a href="{{ route('backend.categories.create') }}"
                                       class="btn btn-sm btn-primary" title="{{ __('Add category') }}"><i
                                                class="material-icons">add</i>&nbsp;{{ __('Add category') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('#') }}
                                    </th>
                                    <th>
                                        {{ __('Name') }}
                                    </th>
                                    <th>
                                        {{ __('Parent') }}
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
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                {{ $category->id }}
                                            </td>
                                            <td>
                                                {{ $category->name }}
                                            </td>
                                            <td>
                                                {{ $category->getParentCategoryName($category->parent_id) }}
                                            </td>
                                            <td>
                                                {{ $category->slug }}
                                            </td>
                                            <td>
                                                {{ $category->status == 1 ? 'Enabled' : 'Disabled' }}
                                            </td>
                                            <td class="row justify-content-end w-100 m-0">
                                                <a href="{{ route('backend.categories.edit', $category->id) }}"><i class="material-icons">edit</i></a>
                                                <form action="{{ route('backend.categories.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="border-0 bg-transparent cursor-pointer btn-action-delete"
                                                            onclick="return confirm('Are you sure？')"><i
                                                                class="material-icons">delete</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
