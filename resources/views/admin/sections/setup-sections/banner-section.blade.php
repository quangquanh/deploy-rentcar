@php
    $default_lang_code = language_const()::NOT_REMOVABLE;
@endphp
@extends('admin.layouts.master')

@push('css')
    <style>
        .fileholder {
            min-height: 374px !important;
        }

        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,.fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view{
            height: 330px !important;
        }
    </style>
@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Setup Section")])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{ __($page_title) }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form" action="{{ setRoute('admin.setup.sections.section.update',$slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center mb-10-none">
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input-file',[
                            'label'             => __("Image").':',
                            'name'              => "image",
                            'class'             => "file-holder",
                            'old_files_path'    => files_asset_path("site-section"),
                            'old_files'         => $data->value->image ?? "",
                        ])
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="product-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @foreach ($languages as $item)
                                        <button class="nav-link @if (get_default_language_code() == $item->code) active @endif" id="{{$item->name}}-tab" data-bs-toggle="tab" data-bs-target="#{{$item->name}}" type="button" role="tab" aria-controls="{{ $item->name }}" aria-selected="true">{{ $item->name }}</button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                @foreach ($languages as $item)
                                    @php
                                        $lang_code = $item->code;
                                    @endphp
                                    <div class="tab-pane @if (get_default_language_code() == $item->code) fade show active @endif" id="{{ $item->name }}" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'     => __("Heading*(To specify the color of the heading text, kindly define the desired color within the third set of brackets)"),
                                                'name'      => $lang_code . "_heading",
                                                'value'     => old($lang_code . "_heading",$data->value->language->$lang_code->heading ?? "")
                                            ])
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'     => __("Sub Heading").'*',
                                                'name'      => $lang_code . "_sub_heading",
                                                'value'     => old($lang_code . "_sub_heading",$data->value->language->$lang_code->sub_heading ?? "")
                                            ])
                                        </div>
                                        <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'     => __("Button Name"),
                                                'name'      => $lang_code . "_button_name",
                                                'value'     => old($lang_code . "_button_name",$data->value->language->$lang_code->button_name ?? "")
                                            ])
                                        </div>
                                        {{-- <div class="form-group">
                                            @include('admin.components.form.input',[
                                                'label'     => __("Button Link"),
                                                'name'      => $lang_code . "_button_link",
                                                'value'     => old($lang_code . "_button_link",$data->value->language->$lang_code->button_link ?? "")
                                            ])
                                        </div> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <label for="">{{ __("Button Link") }}*</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">{{ url('/') }}/</span>
                                <input type="text" class="form--control" name="button_link" value="{{ old("button_link",$data->value->button_link ?? "") }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => __("Submit"),
                            'permission'    => "admin.setup.sections.section.update"
                        ])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')

@endpush