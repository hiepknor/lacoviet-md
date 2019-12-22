@extends('layouts.backend', ['activePage' => 'categories', 'titlePage' => __('Edit Category - '.$category->name)])

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
                    <form action="{{ route('backend.categories.update', $category->id) }}" class="w-100"
                          method="post">
                        @csrf
                        @method('patch')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">{{ __('Edit Category') }}</h4>
                                <p class="card-category"> {{ __('Here you can edit the category') }}</p>
                            </div>
                            <div class="card-body">
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ $error }}</span>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label">{{ __('Status') }}</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <label class="switch">
                                                <input type="checkbox" name="status"
                                                       value="{{$category->status}}" {{$category->status == '1' ? 'checked' : ''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label">{{ __('Parent') }}</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <select {{$categories->count() < 1 ? 'disabled' : null}} class="custom-select"
                                                    id="inputGroupSelect01" name="parent_id">
                                                <option value="0">Choose category...</option>
                                                @foreach($categories as $cate)
                                                    <option value="{{$cate->id}}" {{($category->parent_id == $cate->id ? 'selected' : '')}} {{ $category->id === $cate->id ? 'hidden' : null }}>{{$cate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label">{{ __('Name') }}</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input type="text" required name="name" class="form-control"
                                                   aria-label="Name" value="{{$category->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Slug') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input type="text" required name="slug" class="form-control"
                                                   aria-label="Slug" value="{{$category->slug}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label">{{ __('Description') }}</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                                    <textarea type="text" name="description" class="form-control"
                                                              aria-label="Slug"
                                                              aria-describedby="inputGroupMaterial-sizing-default">{{$category->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{ route('backend.categories.index') }}"
                                   class="btn btn-danger">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        let workingSlug = () => {
            $('input[aria-label="Name"]').keyup(function () {
                $('input[aria-label="Slug"]').val(slugify($(this).val()));
            });
        };

        let workingStatus = () => {
            $('input[type="checkbox"]').on('change', function () {
                if ($(this).is(':checked')) {
                    $(this).attr('value', 1);
                } else {
                    $(this).attr('value', 0);
                }
            });
        };

        $(document).ready(function () {
            workingSlug();

            workingStatus()
        })
    </script>
@endpush
