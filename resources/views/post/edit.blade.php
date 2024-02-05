@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Trang chỉnh sửa bài viết</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ $post->title }}" id="exampleFormControlInput1" placeholder="Title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Description</label>
                        <input type="text" name="description" class="form-control" id="exampleFormControlInput1"
                            value="{{ $post->description }}" placeholder="Description">
                    </div>
                    @if (Auth::User()->role == 'admin')
                        <div class="form-group">


                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                    <option {{ $post->status->name == 'WAITING' ? 'selected' : '' }} value="0">WAITING
                                    </option>

                                    <option {{ $post->status->name == 'PUSHLISHED' ? 'selected' : '' }} value="1">PUSHLISHED
                                    </option>

                                    <option {{ $post->status->name == 'DENIED' ? 'selected' : '' }} value="2">DENIED
                                    </option>
                                </select>
                            </div>
                        </div>
                    @endif

                    <div class="form-group" id="editor">
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" id="task-textarea">{{ old('content') }}{{ $post->content }} </textarea>
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
        </div>
        <script>
            ClassicEditor
                .create(document.querySelector('#task-textarea'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    </div>
@endsection
