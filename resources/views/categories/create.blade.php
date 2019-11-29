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
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button type="submit"
                                           class="btn btn-sm btn-primary" title="{{ __('Save category') }}"><i
                                                    class="material-icons">save</i>&nbsp;{{ __('Save category') }}</button>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend col-md-4">
                                            <label class="input-group-text" for="inputGroupSelect01">Parent
                                                Category</label>
                                        </div>
                                        <select class="browser-default custom-select" id="inputGroupSelect01"
                                                name="parent_id">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend col-md-4">
                                            <div class="input-group-prepend col-md-4">
                                            <span class="input-group-text md-addon"
                                                  id="inputGroupMaterial-sizing-default">Name</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Name"
                                                   aria-describedby="inputGroupMaterial-sizing-default" name="name">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend col-md-4">
                                            <span class="input-group-text md-addon"
                                                  id="inputGroupMaterial-sizing-default">Slug</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Slug"
                                               aria-describedby="inputGroupMaterial-sizing-default" name="slug">
                                    </div>
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend col-md-4">
                                            <span class="input-group-text md-addon"
                                                  id="inputGroupMaterial-sizing-default">Description</span>
                                        </div>
                                        <textarea type="text" class="form-control" aria-label="Slug"
                                                  aria-describedby="inputGroupMaterial-sizing-default"
                                                  name="description"></textarea>
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

@push('js')
    <script>
        (function (document, $) {
            'use strict';
            $('input[aria-label="Name"]').keyup(function () {
                $('input[aria-label="Slug"]').val(slugify($(this).val()));
            });

            function slugify(text) {
                return text.toString().toLowerCase()
                // Support Vietnamese.
                    .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a') // To 'a'.
                    .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e') // To 'e'.
                    .replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i') // To 'i'.
                    .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o') // To 'o'.
                    .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u') // To 'u'
                    .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y') // To 'y'.
                    .replace(/đ/gi, 'd') // To 'd'.
                    // https://gist.github.com/mathewbyrne/1280286
                    .replace(/\s+/g, '-')           // Replace spaces with -
                    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                    .replace(/^-+/, '')             // Trim - from start of text
                    .replace(/-+$/, '');            // Trim - from end of text
            }
        })(document, jQuery);
    </script>
@endpush