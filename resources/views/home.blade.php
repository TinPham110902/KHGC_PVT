@extends('layouts.app')

@section('content')


<div class="container">
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

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
