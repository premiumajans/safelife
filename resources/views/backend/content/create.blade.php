@extends('master.backend')
@section('title',__('backend.content'))
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="card">
                            <form action="{{ route('backend.content.store') }}" class="needs-validation" novalidate
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @include('backend.templates.components.card-col-12',['variable' => 'content'])
                                    @include('backend.templates.components.multi-lan-tab')
                                    <div class="tab-content p-3 text-muted">
                                        @foreach(active_langs() as $lan)
                                            <div class="tab-pane @if($loop->first) active show @endif"
                                                 id="{{ $lan->code }}"
                                                 role="tabpanel">
                                                <div class="form-group row">
                                                    <div class="mb-3">
                                                        <label>@lang('backend.name') <span class="text-danger">*</span></label>
                                                        <input name="name[{{ $lan->code }}]" type="text"
                                                               class="form-control"
                                                               required="" placeholder="@lang('backend.name')">
                                                        {!! validation_response('backend.name') !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.content') <span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="content1[{{ $lan->code }}]"
                                                                  id="elm{{$lan->code}}1"
                                                                  class="form-control"
                                                                  required=""
                                                                  placeholder="@lang('backend.content')"></textarea>
                                                        {!! validation_response('backend.content') !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.title')(Meta)</label>
                                                        <input name="meta_title[{{ $lan->code }}]" type="text"
                                                               class="form-control"
                                                               required="" placeholder="@lang('backend.title')(Meta)">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.description')(Meta)</label>
                                                        <textarea name="meta_description[{{ $lan->code }}]" type="text"
                                                               class="form-control" id="elm{{$lan->code}}2"
                                                               required="" rows="5"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.alt')</label>
                                                        <textarea name="alt[{{ $lan->code }}]" type="text"
                                                                  class="form-control"
                                                                  required="" placeholder="@lang('backend.alt')" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <label>@lang('backend.categories')</label>
                                            <select class="form-control" name="category">
                                                @foreach($mainCategories as $ctgry)
                                                    <optgroup
                                                        label="{{ $ctgry->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}">
                                                        @foreach($ctgry->subcategories as $subCat)
                                                            <option
                                                                value="{{ $subCat->id }}">{{ $subCat->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{--                                        @livewire('content-category')--}}
                                        <div class="mb-3">
                                            <label>PDF</label>
                                            <input name="pdf" type="file" class="form-control"
                                                   accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                                        </div>
                                        <div class="mb-3">
                                            <label>@lang('backend.photo') <span
                                                    class="text-danger">*</span></label>
                                            <input name="photo" type="file" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>@lang('backend.photos')</label>
                                            <input type="file" class="form-control mb-2" id="photos" name="photos[]"
                                                   multiple>
                                            <div id="image-preview-container" class="d-flex flex-wrap"></div>
                                        </div>
                                @include('backend.templates.components.buttons')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @livewireScripts
    @include('backend.templates.components.tiny')
    @include('backend.templates.components.preview-images')
@endsection
