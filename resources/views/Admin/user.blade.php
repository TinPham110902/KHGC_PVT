@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách người dùng</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          {{-- <div class="d-flex">
            <a href="{{ route('post.create') }}" class="btn btn-primary  me-2">Thêm mới</a>

          <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#confirmDeleteAllModal">Xóa tất cả</button>
           
        </div> --}}
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
             
              
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              
                @foreach ($users as $user)
            <tr>
           
               
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->status->name }}</td>
              <td>

                <div class="d-flex">
                  

                    <a href="{{ route('admin.user_edit', ['users' => $user->id]) }}" class="btn btn-warning  me-2"><i class="fa-solid fa-pen"></i></a>
                  
                </div>
               
            </td>
            </tr>
            
            @endforeach
           
            </tbody>
          </table>
         
        
      </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>

    @endsection