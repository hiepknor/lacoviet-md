@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Products')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Products') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage products') }}</p>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
