@extends('layout')
@section('title','Login')
@section('content')
<div class="mt-5">
    @if($errors->any())
    <div class="col-12">
        @foreach($errors->all() as $error)
        <p class="alert alert-danger"> {{$error}}</p>
        @endforeach
    </div>
    @endif

    @if (session()->has('error'))
    <p class="alert alert-danger"> {{session('error')}}</p>
    @endif
    @if (session()->has('success'))
    <p class="alert alert-success"> {{session('success')}}</p>
    @endif
</div>
<div class="container">
<form action="{{route('login.post')}}" method="POST" class=" ms-auto me-auto mt-3" style="width:500px;">
@csrf
<div class="mb-3">
    <label for="exampleInputEmailAdd" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmailAdd" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection