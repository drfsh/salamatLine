@if($item->auditable_type == "App\Models\Product")
محصول
@elseif($item->auditable_type == "App\Models\Feature")
ویژگی محصول
@elseif($item->auditable_type == "App\Models\ProductPhoto")
تصاویر بیشتر، از محصول
@elseif($item->auditable_type == "App\Models\Multiprice")
چندقیمتی
@elseif($item->auditable_type == "App\Models\Multifeature")
انتخاب ویژگی
@elseif($item->auditable_type == "App\Models\Feature")
@elseif($item->auditable_type == "App\Models\Feature")
@endif