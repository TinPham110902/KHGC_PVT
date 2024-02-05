@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách bài viết của bạn</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="d-flex">
            <a href="{{ route('post.create') }}" class="btn btn-primary  me-2">Thêm mới</a>

          <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#confirmDeleteAllModal">Xóa tất cả</button>
           
        </div>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
             
              
              <th></th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              
                @foreach ($posts as $post)
            <tr>
           
             
              <td> 
                    <div class="row">
                        <div class="col-md-4">
                            @if ($post->hasMedia())
                            <img class="img-fluid" src="{{ $post->getFirstMediaUrl() }}" alt="">
                            @else
                            <img class="img-fluid" src="/storage/defaut_img/not found.png" alt="">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                               <h1 class="card-title"> <strong>{{ $post->title }}</strong></h1>
                           
                                <p class="card-text">{{ $post->description }}</p>
                                <p>  <small>{{ $post->created_at }}</small></p>
                            </div>
                        </div>
                    </div>
                </td>
              <td>

                <div class="d-flex">
                  
                
                  <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                    <i class="fa-solid fa-trash"></i>
                </button>
                

                    <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-warning  me-2"><i class="fa-solid fa-pen"></i></a>
                    <a href="{{ route('post.show', ['post' => $post->id]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                </div>
               
            </td>
            </tr>
            
            @endforeach
           
            </tbody>
          </table>
          @include('post.popup')
        
      </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>

    @endsection