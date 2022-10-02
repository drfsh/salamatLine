@extends('layouts.admin')

@section('NavItems')
    @include('admin.page.NavItems')
@endsection

@section('content')
    <div class="grid-x grid-padding-x">
        <div class="cell medium-8 medium-offset-3 m-auto">
            <page-info-settings></page-info-settings>
        </div>
    </div>
@endsection
