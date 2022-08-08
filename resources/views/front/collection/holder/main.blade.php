@extends('layouts.front')

@section('content')
    {{ Breadcrumbs::render('CollectionHolder') }}
	<div class="double-gap"></div>
	<div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <div class="grid-x small-up-2 medium-up-3 large-up-4">
                    @foreach($data['collections'] as $item)
                        <div class="cell">@include('front.collection.holder.item')</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>
@endsection