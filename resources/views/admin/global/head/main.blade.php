<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
<link href="{{ mix('/css/admin/app.css') }}" rel="stylesheet">
<link href="{{ mix('/css/admin/new.css') }}" rel="stylesheet">

@include('front.global.head.favicon')
