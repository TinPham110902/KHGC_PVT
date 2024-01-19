@extends('layout.User.app')
@section('User_content')
<div class="contact-form">
<form action="{{ route('sendMail') }}" method="POST">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Your Name</label>
        <input
            type="text"
            class="form-control"
            name="Name"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <small id="helpId" class="form-text text-muted">Help text</small>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Email address</label>
      <input type="email" name="MailName" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Message</label>
      <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button
    type="submit"
    class="btn btn-primary"
  >
    Submit
  </button>
  </form>

  
</div>
@endsection
@push('PVT')
<link rel="stylesheet" href="{{asset('Css/Style.css')}}">
@endpush