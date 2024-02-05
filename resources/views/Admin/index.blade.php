@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Admin!') }}

                    
                </div>
               
            </div>
            <a name="" id="" class="btn btn-primary" href="{{ route('admin.post') }}" role="button">Quản lý bài viết</a>
            <a name="" id="" class="btn btn-primary" href="{{ route('admin.index') }}" role="button">Quản lý tài khoản</a>
        </div>
    </div>
</div>
@endsection
