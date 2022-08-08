<div class="grid-x grid-padding-x small-up-3 medium-up-3 large-up-7">
	<div class="cell"><x-admin.card color="y18" icon="fab fa-codepen" subtitle="محصولات" title="{{$data['product_count']}}" footer="{{$data['product_publish_count']}} منتشر شده"  /></div>
	<div class="cell"><x-admin.card color="y14" icon="fas fa-users" subtitle="کاربران" title="{{$data['user_count']}}" footer="{{$data['user_admin_count']}} نفر با دسترسی مدیریت" /></div>

    <div class="cell"><x-admin.card color="y14" icon="fas fa-database" subtitle="دسته‌بندی" title="{{$data['category_count']}}"  /></div>
    <div class="cell"><x-admin.card color="y15" icon="fab fa-earlybirds" subtitle="برند" title="{{$data['brand_count']}}"  /></div>
    <div class="cell"><x-admin.card color="y16-2" icon="fas fa-city" subtitle="کمپانی" title="{{$data['company_count']}}"  /></div>
    <div class="cell"><x-admin.card color="y17" icon="fas fa-pump-soap" subtitle="جنس" title="{{$data['material_count']}}"  /></div>
    <div class="cell"><x-admin.card color="y18" icon="fas fa-globe-europe" subtitle="کشور" title="{{$data['country_count']}}"  /></div>

</div>
