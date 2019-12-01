@extends('layouts.app', ['activePage' => 'categories', 'titlePage' => __('Edit Category')])
@push('style')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
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
                            <h4 class="card-title ">{{ __('Edit Category') }}</h4>
                            <p class="card-category"> {{ __('Here you can edit the category') }}</p>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('backend.categories.store') }}" class="w-100" method="post">
                                @csrf
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($errors->all())
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button type="submit"
                                           class="btn btn-sm btn-primary" title="{{ __('Save category') }}"><i
                                                    class="material-icons">save</i>&nbsp;{{ __('Save category') }}</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="w-100">
                                        <div class="input-group mb-3 col-md-6">
                                            <div class="input-group-prepend col-md-4">
                                                <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">Status</span>
                                            </div>
                                            <label class="switch ml-4">
                                                <input type="checkbox" name="status" value=0>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="input-group mb-3 col-md-6">
                                            <div class="input-group-prepend col-md-4">
                                                <label class="input-group-text" for="inputGroupSelect01">Parent Category</label>
                                            </div>
                                            <select {{$categories->count() < 1 ? 'disabled' : null}} class="browser-default custom-select ml-4" id="inputGroupSelect01" name="parent_id">
                                                <option>Choose category...</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-group mb-3 col-md-6">
                                            <div class="input-group-prepend col-md-4">
                                                <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">Name</span>
                                            </div>
                                            <input type="text" required name="name" class="form-control ml-4" aria-label="Name" aria-describedby="inputGroupMaterial-sizing-default">
                                        </div>
                                        <div class="input-group mb-3 col-md-6">
                                            <div class="input-group-prepend col-md-4">
                                                <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">Slug</span>
                                            </div>
                                            <input type="text" required name="slug" class="form-control ml-4" aria-label="Slug" aria-describedby="inputGroupMaterial-sizing-default">
                                        </div>
                                        <div class="input-group mb-3 col-md-6">
                                            <div class="input-group-prepend col-md-4">
                                                <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">Description</span>
                                            </div>
                                            <textarea type="text" name="description" class="form-control ml-4" aria-label="Slug" aria-describedby="inputGroupMaterial-sizing-default"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
