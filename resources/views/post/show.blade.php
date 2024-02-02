@extends('layouts.app')

@section('content')
<div class="show-post">



<h1>trang chi tiết bài viết</h1>

<h1>{{ $post->title }}</h1>
<span>{{ $post->description }}</span>

 <p>{!! htmlspecialchars_decode($post->content) !!}</p>
</div>

@push('PVT')
<link rel="stylesheet" href="{{asset('Css/Style.css')}}">
@endpush
 @endsection