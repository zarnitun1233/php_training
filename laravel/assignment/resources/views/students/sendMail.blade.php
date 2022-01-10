@extends('students.layout')

@section('content')
<div class="row mt-5">
  <div class="col-12">
    <div class="float-start">
      <h2>Send Student Data to email</h2>
    </div>
    <div class="float-end">
      <a class="btn btn-success" href="{{ url('/') }}">Back</a>
    </div>
  </div>
</div>
<form action="{{ url('/sendMailData') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Email:</strong>
        <input type="email" name="email" class="form-control" placeholder="Email">
        @error('email')
        <span class="alert alert-danger mt-1 mb-1 d-block">
          {{ $message }}
        </span>
        @enderror
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
  </div>
</form>
@endsection