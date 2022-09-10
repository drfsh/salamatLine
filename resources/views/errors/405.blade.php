@extends('layouts.error')
@section('content')

  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="cell text-center error" style="margin: auto;">
        <h1>خطا 405</h1>
        <p class="ppp">صفحه مورد نظر در دسترس نمی‌باشد!</p>

        <form style="width: 290px;" action="{{ route('search') }}" method="get" class="search-menu">
          <input type="text" name="query" placeholder="جستجو در محصولات" />
          <button type="submit" aria-label="Search">
            @include('icons.search')
          </button>
        </form>
        <img src="{{asset('img/page/404.png')}}"/>
        <div class="double-gap"></div>
        <div class="back">
          <a href="{{route('home')}}">
            @include('icons.home')
            سلامت لاین
          </a>
          <a href="{{route('home')}}">
            @include('icons.basket2')
            فروشگاه
          </a>
          <a href="/blog">
            @include('icons.document_text')
            بلاگ
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection