@extends('layouts.front')

@section('content')
    <div class="grid-container">
        {{ Breadcrumbs::render('collection',$data['collection']) }}
        <div class="grid-x grid-padding-x ">
            @include('front.collection.main.banner')
            <div class="cell">
                <div class="double-gap"></div>
                <div class="grid-x grid-padding-x ">
                    @foreach($data['products'] as $i=>$item)
                        @if($i==4) @break @endif
                        <div class="cell small-2 medium-4 large-3">@include('front.product.holder.item.main')</div>
                    @endforeach
                    @include('front.collection.main.banner2')
                    @foreach($data['products'] as $i=>$item)
                        @if($i<4) @continue @endif
                        @if($i==8) @break @endif
                        <div class="cell small-2 medium-4 large-3">@include('front.product.holder.item.main')</div>
                    @endforeach
                    @include('front.collection.main.banner3')
                    @foreach($data['products'] as $i=>$item)
                        @if($i<8) @continue @endif
                        <div class="cell small-2 medium-4 large-3">@include('front.product.holder.item.main')</div>
                    @endforeach
                </div>
                <div class="double-gap"></div>
                {{ $data['products']->links() }}
            </div>
            <div class="cell">
                @include('front.collection.main.other')
            </div>
        </div>
    </div>
    <div class="double-gap"></div>
@endsection