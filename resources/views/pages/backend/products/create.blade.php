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
    </style>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('backend.products.store') }}" class="w-100" method="post">
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
                                <button type="button"
                                        class="btn btn-primary btn-product-next">{{ __('Next step') }}</button>
                            </div>
                        </div>
                        <div class="card" id="productImg">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">{{ __('Upload images') }}</h4>
                                <p class="card-category"> {{ __('Where you can upload images to product') }}</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 standard-upload">
                                        <div class="standard-image-wrap" style="background-color: lightgray; width: 200px; height: 200px">

                                        </div>
                                        <div class="d-flex justify-content-start mb-2 mt-2">
                                            <input type="button" value="Change" class="border-0 pl-3 pr-3 standard-update-file mr-2">
                                            <input type="file" class="standard-choose-file" name="file"
                                                   style="opacity: initial; position: initial">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div id="upload-widget" class="dropzone"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="button" class="btn btn-primary" onclick='window.location="{{ route('backend.products.index') }}"'>Done</button>
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

        let productStore = (product) => {
            $.ajax({
                url: '{{ route('backend.products.store') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: product,
                success: function (res) {
                    let productId = res.id;
                    console.log(productId)
                }
            });
        };

        let workingDropzone = () => {
            $('#upload-widget').dropzone({
                url: '/'
            })
        };

        let showChangeImageButton = () => {
            let standardUpdateFile = $('input.standard-update-file');
            let standardChooseFile = $('input.standard-choose-file');
            standardUpdateFile.hide();

            standardChooseFile.on('change', function (event) {
                event.preventDefault();
                let file = this.files[0];

                // Check if has file do show update button
                if (file) {
                    standardUpdateFile.show();
                }

                uploadStandardImage(file)
            });
        };

        let uploadStandardImage = (file) => {
            $.ajax({
                url: '{{ route('backend.productImages.upload') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: file,
                contentType: false,
                processData: false,
            })
        };

        $(document).ready(function () {
            workingSlug();
            workingStatus();

            // Store product to model
            let product = {
                name: '',
                category_id: 0,
                unit_price: 0,
                slug: '',
                description: '',
                status: 0
            };

            let cardInfo = $('#productInfo');
            let cardImg = $('#productImg');
            cardInfo.show();
            cardImg.hide();

            let btnProductNext = $('.btn-product-next');
            btnProductNext.on('click', function () {
                cardInfo.hide();
                cardImg.show();
                product.status = $('input[name="status"]').val();
                product.category_id = $('select[name="category_id"]').val();
                product.name = $('input[name="name"]').val();
                product.slug = $('input[name="slug"]').val();
                product.unit_price = $('input[name="unit_price"]').val();
                product.description = $('input[name="description"]').val();

                productStore(product);

                showChangeImageButton();

                workingDropzone();
            });
        })
    </script>
@endpush