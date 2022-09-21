@if(auth()->user()->mobile==null || auth()->user()->email==null ||  auth()->user()->code_m==null )
<div class="bbox flex-row font-16">
    <div class="color-info flex-center">
        <i class="fas fa-info-circle ml-2"></i>
        <span class="text-l">برای افزایش امنیت حساب کاربری خود و جلو گیری از سوءاستفاده، لطفا هویت خود را تایید کنید</span>
    </div>
    <a href="{{route('ProfileEdit')}}">
        <div class="color-next flex-center">
            <span class="ml-2">تایید هویت</span>
            <i class="fas fa-chevron-left"></i>
        </div>
    </a>
</div>
@endif