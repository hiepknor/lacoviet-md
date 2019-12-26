@extends('layouts.backend', ['activePage' => 'products', 'titlePage' => __('Product Create')])

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

        .standard-preview {
            background-color: lightgray;
            width: 200px;
            height: 200px;
            overflow: hidden;
            border: 3px solid lightgray;
            border-radius: 5px;
        }

        .standard-preview img {
            transition: 500ms;
        }

        .standard-preview:hover img {
            transform: scale(1.1);
            transition: 500ms;
        }
    </style>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('backend.products.store') }}" class="w-100" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card" id="productInfo">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">{{ __('Create new product') }}</h4>
                                <p class="card-category"> {{ __('Where you can create new one') }}</p>
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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-2 d-flex align-items-center">
                                            <label class="col-form-label">{{ __('Status') }}</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group bmd-form-group">
                                                <label class="switch">
                                                    <input type="checkbox" name="status">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 d-flex align-items-center">
                                            <label class="col-form-label">{{ __('Category') }}</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group bmd-form-group">
                                                <select {{$categories->count() < 1 ? 'disabled' : null}} class="custom-select"
                                                        id="inputGroupSelect01" name="category_id">
                                                    <option value="0">Choose category...</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
                                                       aria-label="Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 d-flex align-items-center">
                                            <label class="col-form-label">{{ __('Slug') }}</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group bmd-form-group">
                                                <input type="text" name="slug" class="form-control"
                                                       aria-label="Slug">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 d-flex align-items-center">
                                            <label class="col-form-label">{{ __('Price') }}</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group bmd-form-group">
                                                <input type="number" required name="unit_price" class="form-control"
                                                       min="0"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 d-flex align-items-center">
                                            <label class="col-form-label">{{ __('Image') }}</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="standard-preview mb-2">
                                                <img src="" alt="" width="200" height="200">
                                            </div>
                                            <input type="file" name="image" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 d-flex align-items-center">
                                            <label class="col-form-label">{{ __('Description') }}</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group bmd-form-group">
                                                <input type="text" name="description" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{ route('backend.categories.index') }}"
                                   class="btn btn-danger">{{ __('Cancel') }}</a>
                                <button type="submit"
                                        class="btn btn-primary">{{ __('Save') }}</button>
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
        Dropzone.autoDiscover = false;

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

        let workingDropzone = () => {
            $('#upload-widget').dropzone({
                url: '/'
            })
        };

        let readURL = (input) => {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = (e) => {
                    $('.standard-preview img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

        let workingStandardPreview = () => {
            let previewInput = $('input[name="image"]');
            previewInput.change((event) => {
                let input = event.target;
                readURL(input);
            })
        };

        $(document).ready(function () {
            workingSlug();
            workingStatus();
            workingStandardPreview()
        })
    </script>
@endpush