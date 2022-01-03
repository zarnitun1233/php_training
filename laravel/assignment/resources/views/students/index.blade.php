@extends('students.layout')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Students List</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{ url('/create') }}"> Add new Students</a>
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Age</th>
    <th>Major</th>
    <th width="280px">Action</th>
  </tr>
  @foreach ($students as $student)
  <tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->age }}</td>
    <td>{{ $student->major->major }}</td>
    <td>
      <form action="{{ url('delete/'.$student->id) }}" method="POST">
        <a class="btn btn-primary" href="{{ url('/edit',$student->id) }}">Edit</a>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

@endsection