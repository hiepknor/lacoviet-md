@extends('layouts.app', ['activePage' => 'categories', 'titlePage' => __('Category Create')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Create new category') }}</h4>
                        <p class="card-category"> {{ __('Where you can create new one') }}</p>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('backend.categories.create') }}"
                                    class="btn btn-sm btn-primary" title="{{ __('Save category') }}"><i
                                        class="material-icons">save</i>&nbsp;{{ __('Save category') }}</a>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <form action="" class="w-100">
                                <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend col-md-4">
                                        <label class="input-group-text" for="inputGroupSelect01">Parent Category</label>
                                    </div>
                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="md-form input-group mb-3 col-md-6">
                                    <div class="input-group-prepend col-md-4">
                                        <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">Name</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Name" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>
                                <div class="md-form input-group mb-3 col-md-6">
                                    <div class="input-group-prepend col-md-4">
                                        <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">Slug</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Slug" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>
                                <div class="md-form input-group mb-3 col-md-6">
                                    <div class="input-group-prepend col-md-4">
                                        <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">Description</span>
                                    </div>
                                    <textarea type="text" class="form-control" aria-label="Slug" aria-describedby="inputGroupMaterial-sizing-default"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection