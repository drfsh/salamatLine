@extends('layouts.front')
@section('content')
<div class="double-gap"></div>
<div class="double-gap"></div>
<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <div class="cell small-4 large-offset-4 text-center">
      <h1>خطای 500</h1>
      <div class="double-gap"></div>
      <p>خطا در پردازش لطفا بعدا مراجعه کنید</p>
      <p>در صورت لزوم به ما اطلاع دهید</p>
      <div class="double-gap"></div>
      <a href="{{route('home')}}" class="button primary">بازگشت به صفحه خانه</a>
    </div>
  </div>
</div>
@endsection