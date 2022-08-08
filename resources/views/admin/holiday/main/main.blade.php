<div class="cell medium-4">
    @if (Session::has('success'))
        <div class="cell callout success">
            {{ Session::get('success') }}
        </div>
        <div class="double-gap"></div>
    @endif
    @include('admin.holiday.main.right')
</div>
<div class="cell medium-8">
    @include('admin.holiday.main.left')
</div>