<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('صفحه نخست', route('home'));
});


Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push('سبد خرید', route('cart'));
});


Breadcrumbs::for('favorite', function ($trail) {
    $trail->parent('home');
    $trail->push('علاقه‌مندی‌ها', route('cart'));
});



// Category Holder
Breadcrumbs::for('CategoryHolder', function ($trail) {
    $trail->parent('home');
    $trail->push('دسته‌بندی', route('categoryHolder'));
});

// Category
Breadcrumbs::for('category', function ($trail, $data) {
    $trail->parent('CategoryHolder');
    $trail->push($data->name ,route('category', $data->slug));
});

// ProductHolder
Breadcrumbs::for('ProductHolder', function ($trail) {
    $trail->parent('home');
    $trail->push('محصولات', route('productHolder'));
});


Breadcrumbs::for('product', function ($trail,$data) {
    $trail->parent('ProductHolder');
    $trail->push($data->title ,route('product', $data->slug));
});

// {{$data['product']->categories[0]->name}}



// ===============Profile==================
Breadcrumbs::for('Profile', function ($trail) {
    $trail->parent('home');
    $trail->push('پروفایل', route('profile'));
});

Breadcrumbs::for('Password', function ($trail) {
    $trail->parent('Profile');
    $trail->push('تغییر رمز عبور', route('ChangePassword'));
});

Breadcrumbs::for('Address', function ($trail) {
    $trail->parent('Profile');
    $trail->push('مدیریت آدرس‌ها', route('ProfileAddress'));
});

Breadcrumbs::for('NewAddress', function ($trail) {
    $trail->parent('Address');
    $trail->push('ثبت آدرس جدید', route('NewAddress'));
});

Breadcrumbs::for('Edit', function ($trail) {
    $trail->parent('Profile');
    $trail->push('ویرایش اطلاعات', route('ProfileEdit'));
});

Breadcrumbs::for('Orders', function ($trail) {
    $trail->parent('Profile');
    $trail->push('سفارشات فعال', route('ProfileOrders'));
});
Breadcrumbs::for('History', function ($trail) {
    $trail->parent('Profile');
    $trail->push('بایگانی سفارشات گذشته', route('OrderHistory'));
});


// Home > Page
Breadcrumbs::for('indexpage', function ($trail) {
    $trail->parent('home');
    $trail->push('صفحات', route('indexpage'));
});

// Home > Page > main
Breadcrumbs::for('singlepage', function ($trail, $page) {
    $trail->parent('indexpage');
    $trail->push($page->title, route('singlepage', $page->slug));
});

// Home > partnership
Breadcrumbs::for('Partner', function ($trail) {
    $trail->parent('home');
    $trail->push('فرم اعلام همکاری تجاری', route('Partner'));
});


// Country
Breadcrumbs::for('CountryHolder', function ($trail) {
    $trail->parent('home');
    $trail->push('کشور', route('countryHolder'));
});

Breadcrumbs::for('Country', function ($trail,$item) {
    $trail->parent('home');
    $trail->push('کشور', route('countryHolder'));
    $trail->push($item->title, route('countryHolder'));
});


// Brand
Breadcrumbs::for('BrandHolder', function ($trail) {
    $trail->parent('home');
    $trail->push('برند', route('brandHolder'));
});

Breadcrumbs::for('Brand', function ($trail,$item) {
    $trail->parent('home');
    $trail->push('برند', route('brandHolder'));
    $trail->push($item->title, route('brandHolder'));
});


// Collection Holder
Breadcrumbs::for('CollectionHolder', function ($trail) {
    $trail->parent('home');
    $trail->push('مجموعه', route('collectionHolder'));
});

// Colection
Breadcrumbs::for('collection', function ($trail, $data) {
    $trail->parent('CollectionHolder');
    $trail->push($data->title , route('collection', $data->slug));
});


// Compare
Breadcrumbs::for('Compare', function ($trail,$page) {
    $trail->parent('home');
    $trail->push('مقایسه ('.$page->title.')', route('Compare', $page->slug));
});