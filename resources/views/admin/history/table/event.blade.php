@if($item->event == 'deleted')
    <span class="label alert">حذف</span>
@elseif($item->event == 'updated')
    <span class="label warning">بروزرسانی</span>
@elseif($item->event =='created')
    <span class="label success">ایجاد</span>     
@endif