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

@if(Session::has('success'))
<div id="alert" class="alert alert-success">
    {{ Session::get('success') }}
</div>

<script>

    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 2000); // 5 giây
</script>

@endif

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

            <form action="{{ route('post.destroyAll', ['id' => Auth::id()]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger me-2">Xóa tất cả</button>
          </form>
           
        </div>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Thumbnail</th>
              <th>Title</th>
              <th>Description</th>
              <th>Pushlish_date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
            <tr>
              <td>{{ $post -> thumbnail }}</td>
              <td>{{ $post -> title }}</td>
              <td>{{ $post -> description }}</td>
              <td>{{ $post -> created_at }}</td>
              <td>{{ $post -> status }}</td>
              <td>
                <div class="d-flex">
                    <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger me-2"><i class="fa-solid fa-trash"></i></button>
                    </form>

                  

                    <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-warning  me-2"><i class="fa-solid fa-pen"></i></a>
                    <a href="{{ route('post.show', ['post' => $post->id]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                </div>
               
            </td>
            </tr>
            @endforeach
           
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>


    @endsection