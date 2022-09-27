<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('خانه', route('home'));
});


Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push('سبد خرید', route('cart'));
});


Breadcrumbs::for('MyFavorites', function ($trail) {
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
    if (is_array($data) or $data instanceof Traversable)
    {
        $trail->parent('home');
        $trail->push($data[sizeof($data)-1]->name ,route('category', $data[sizeof($data)-1]->slug));
    }else{
        $trail->parent('CategoryHolder');
        $trail->push($data->name ,route('category', $data->slug));
    }
});

// ProductHolder
Breadcrumbs::for('ProductHolder', function ($trail) {
    $trail->parent('home');
    $trail->push('محصولات', route('productHolder'));
});


Breadcrumbs::for('product', function ($trail,$data) {
    $trail->parent('category',$data->categories);
    $trail->push($data->title ,route('product', $data->slug));
});

// {{$data['product']->categories[0]->name}}



// ===============profile==================
Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('home');
    $trail->push('پیشخوان', route('profile'));
});

Breadcrumbs::for('Password', function ($trail) {
    $trail->parent('profile');
    $trail->push('تغییر رمز عبور', route('ChangePassword'));
});

Breadcrumbs::for('ProfileAddress', function ($trail) {
    $trail->parent('profile');
    $trail->push('مدیریت آدرس‌ها', route('ProfileAddress'));
});

Breadcrumbs::for('contactus', function ($trail) {
    $trail->parent('home');
    $trail->push('تماس با ما', route('contactus'));
});
Breadcrumbs::for('Tickets', function ($trail) {
    $trail->parent('profile');
    $trail->push('تیکت ها', route('Tickets'));
});
Breadcrumbs::for('NewTickets', function ($trail) {
    $trail->parent('profile');
    $trail->push('ارسال تیکت', route('NewTickets'));
});

Breadcrumbs::for('NewAddress', function ($trail) {
    $trail->parent('ProfileAddress');
    $trail->push('ثبت آدرس جدید', route('NewAddress'));
});

Breadcrumbs::for('ProfileEdit', function ($trail) {
    $trail->parent('profile');
    $trail->push('ویرایش اطلاعات', route('ProfileEdit'));
});
Breadcrumbs::for('OrdersTracking', function ($trail) {
    $trail->parent('profile');
    $trail->push('پیگیری سفارشات', route('ProfileEdit'));
});

Breadcrumbs::for('ProfileOrders', function ($trail) {
    $trail->parent('profile');
    $trail->push('سفارشات', route('ProfileOrders'));
});
Breadcrumbs::for('History', function ($trail) {
    $trail->parent('profile');
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
