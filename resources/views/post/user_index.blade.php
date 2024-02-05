@extends('layouts.app')

@section('content')


<div class="card-body">
          


    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
       
        
        <th></th>
      
      </tr>
      </thead>
      <tbody>
        
          @foreach ($posts as $post)
      <tr>
     
       
        <td> 
            <a href="{{ route('post.show_user_post',['post' => $post->slug])}}">
                <div class="card" style="width:60%; "
                onmouseover="this.style.backgroundColor='#8ba6c3';" 
                onmouseout="this.style.backgroundColor='white'; ">
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
                </div>
            </a>
          </td>
 
      </tr>
      
      @endforeach
     
      </tbody>
    </table>
    @include('post.popup')
  
</div>



    @endsection