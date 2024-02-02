@extends('layouts.app')

@section('content')

<h1>trang tạo mới bài viết</h1>



        <div class="container">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"  id="exampleFormControlInput1" placeholder="Title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                 
                
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleFormControlInput1" value="{{ old('description') }}" placeholder="Description">
                  </div>
                 
                

                <div class="form-group" id="editor">
                       <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" id="task-textarea">{{ old('content') }}</textarea>
                       @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group row">
                    <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>



<script>
    ClassicEditor
        .create( document.querySelector( '#task-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@push('PVT')
<link rel="stylesheet" href="{{asset('Css/Style.css')}}">
@endpush
@endsection