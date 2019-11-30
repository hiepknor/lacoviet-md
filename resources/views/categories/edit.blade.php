@extends('layouts.app', ['activePage' => 'categories', 'titlePage' => __('Edit Category')])

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
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
