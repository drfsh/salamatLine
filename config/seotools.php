<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => config('app.name'), // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'فروشگاه تجهیزات پزشکی، طبی و آزمایشکاهی سلامت لاین  تخصصی ترین و بزرگترین فروشگاه تجهیزات پزشکی دارای انواع تجهیزات و لوازم پزشکی و طبی  با بیش از 10000 قلم کالای پزشکی عمومی، تخصصی، آزمایشکاهی و خانگی', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['Salamatline Shop', 'فروشگاه اینترنتی سلامت لاین' , 'فروشگاه لوازم پزشکی', 'فروشگاه لوازم طبی', 'لوازم جراحی', 'جلوگیری از ویروس کرونا', 'بزرگترین فروشگاه لوازم پزشکی', 'لوازم آزمایشگاهی', 'بهترین فروشگاه لوازم پزشکی ', 'سلامت لاین', 'انواع ضد عفونی کننده', 'انواع ماسک', 'دستگاه اکسیژن ساز', 'دستگاه پالس اکسیمتر', 'دستگاه فند خون', 'دستگاه فشار خون', 'جعبه کمک های اولیه'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => 'index,follow', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => config('app.name'), // set false to total remove
            'description' => 'فروشگاه تجهیزات پزشکی، طبی و آزمایشکاهی سلامت لاین  تخصصی ترین و بزرگترین فروشگاه تجهیزات پزشکی دارای انواع تجهیزات و لوازم پزشکی و طبی  با بیش از 10000 قلم کالای پزشکی عمومی، تخصصی، آزمایشکاهی و خانگی', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Salamat Line', // set false to total remove
            'description' => 'فروشگاه تجهیزات پزشکی، طبی و آزمایشکاهی سلامت لاین  تخصصی ترین و بزرگترین فروشگاه تجهیزات پزشکی دارای انواع تجهیزات و لوازم پزشکی و طبی  با بیش از 10000 قلم کالای پزشکی عمومی، تخصصی، آزمایشکاهی و خانگی', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
