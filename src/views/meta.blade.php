<?php $title = config('seo.title', config('app.name')) ?>
@if(!empty($meta['title']))
    @if(empty($meta['absolute_title']))
        <title>{{ $meta['title'] . ' - '.$title }}</title>
    @else
        <title>{{ $meta['title'] }}</title>
    @endif
@else
    <title>{{$title}}</title>
@endif


{{--Google Metadata --}}
@if(!empty($meta['title']))
    <meta name="name" content="{{ $meta['title'] }}">
@endif

@if(!empty($meta['description']))
    <meta name="description"
          content="{{ str_limit($meta['description'], $limit = 200, $end = '...') }}" />
@endif

@if(!empty($meta['keywords']))
    <meta name="keywords" content="{{ $meta['keywords'] }}" />
@endif

@if(!empty($meta['author']))
    <meta name="author" content="{{ $meta['author'] }}">
@endif


{{-- Facebook Metadata --}}
<meta property="og:type" content="website" />

@if(!empty($meta['og_title']))
    <meta property="og:title" content="{{ $meta['og_title'] }}" />
    <meta name="twitter:title" content="{{ $meta['og_title'] }}">

@elseif(!empty($meta['title']))
    <meta property="og:title" content="{{ $meta['title'] }}" />
    <meta name="twitter:title" content="{{ $meta['title'] }}" />
@endif

@if(!empty($meta['og_description']))
    <?php $description = str_limit($meta['og_description'], $limit = 250, $end = '...'); ?>
    <meta property="og:description" content="{{$description}}" />
    <meta name="twitter:description" content="{{$description }}" />

@elseif(!empty($meta['description']))
    <?php $description = str_limit($meta['description'], $limit = 250, $end = '...'); ?>
    <meta property="og:description" content="{{$description }}" />
    <meta name="twitter:description" content="{{$description }}" />
@endif

@if(!empty($meta['image']))
    <meta name="image" content="{!! $meta['image'] !!}" />
    <meta property="og:image" content="{!! $meta['image'] !!}" />
    <meta property="twitter:image" content="{!! $meta['image'] !!}" />
@endif

@if(!empty($meta['image_width']))
    <meta property="og:image:width" content="{{$meta['image_width']}}" />
@endif{{--Facebook Metadata /--}}
@if(!empty($meta['image_height']))
    <meta property="og:image:height" content="{{$meta['image_height'] }}" />
@endif

{{-- Twitter Metadata --}}
<meta name="twitter:card" content="summary" />
@if($handle = config('seo.twitter_handle'))
    <meta name="twitter:site" content="{{$handle}}" />
@endif
<meta name="twitter:domain" content="{{request()->getHttpHost()}}">

{{-- URL/Canonical Metadata --}}
@if(!empty($meta['url']))
    <meta property="og:url" content="{!! $meta['url'] !!}">
@else
    <meta property="og:url" content="{!! request()->fullUrl() !!}">
@endif

{{-- Article Metadata --}}
@if(!empty($meta['published_time']))
    <meta name="article:published_time"
          content="{{\Carbon\Carbon::parse($meta['published_time'])->toDateTimeString()}}">
@endif

@if(!empty($meta['type']))
    <meta property="og:type" content="{{$meta['type']}}" />
@endif

@if(!empty($meta['product']))
    @foreach($meta['product'] as $key => $value)
        <meta name="product:{{$key}}" content="{{$value}}" />
    @endforeach
@endif
