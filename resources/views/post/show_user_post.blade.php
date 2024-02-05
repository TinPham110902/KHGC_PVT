@extends('layouts.app')

@section('content')
<div class="show-post">


    <div class="card">
<div class="card-header">
    <h3 class="card-title">Trang chi tiết bài viết</h3>
  </div>
  <div class="card-body">
<h1>{{ $post->title }}</h1>
<span>{{ $post->description }}</span>

 @if ($post->hasMedia())
 <img src="{{$post->getFirstMediaUrl()}}" style="width:90px; height:90px;" alt="">
       
    @endif
    {{ $post->getFirstMediaUrl()}}
 <p>{!! htmlspecialchars_decode($post->content) !!}</p>
</div>
    </div>
</div>
@push('PVT')
<link rel="stylesheet" href="{{asset('Css/Style.css')}}">
@endpush
 @endsection