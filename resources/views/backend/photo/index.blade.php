@extends('master.backend')
@section('title',__('backend.photo'))
@section('styles')
    @include('backend.templates.components.dt-styles')
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">@lang('backend.photo'):</h4>
                                <a href="{{ route('backend.photo.create') }}" class="btn btn-primary mb-3"><i
                                        class="fas fa-plus"></i> &nbsp;@lang('backend.add-new')
                                </a>
                            </div>
                        </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>@lang('backend.slug'):</th>
                                <th>@lang('backend.photos')</th>
                                <th>@lang('backend.actions'):</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($photos as $photo)
                                <tr>
                                    <td>{{ $photo->id }}</td>
                                    <td><img src="{{ asset($photo->photo) }}" style="width: 100px;height: 80px;"></td>
                                    <td class="text-center"><a class="btn btn-primary" href="{{ route('backend.photoPhotos',$photo->id) }}"><i class="fas fa-images"></i></a></td>
                                    @include('backend.templates.components.dt-settings',['variable' => 'photo','value' => $photo])
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('backend.templates.components.dt-scripts')
@endsection
