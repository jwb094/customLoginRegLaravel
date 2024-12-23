@extends('layout')
@section('title','Registration')
@section('content')
<div class="container">
<form class=" ms-auto me-auto mt-3" style="width:500px;">
<div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="email" class="form-control" id="exampleInputName" name="fullname" aria-describedby="emailHelp">
  </div>
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