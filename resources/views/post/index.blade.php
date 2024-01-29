@extends('layouts.app')

@section('content')

    @if(Session::has('login'))
    <div id="alert" class="alert alert-success">
        {{ Session::get('login') }}
    </div>

    <script>

        setTimeout(function() {
            document.getElementById('alert').style.display = 'none';
        }, 2000); // 5 giây
    </script>

@endif
    <h1>trang danh sách bài viết</h1>
    @endsection