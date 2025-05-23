@extends('layout')

@section('content')
<h2>Add New Student</h2>

<form method="POST" action="/add">
  @csrf
  <label>Name:</label>
  <input type="text" name="name" value="{{ old('name') }}" required />
  @error('name')<div style="color:red;">{{ $message }}</div>@enderror

  <label>Email:</label>
  <input type="email" name="email" value="{{ old('email') }}" required />
  @error('email')<div style="color:red;">{{ $message }}</div>@enderror

  <label>Age:</label>
  <input type="number" name="age" value="{{ old('age') }}" required />
  @error('age')<div style="color:red;">{{ $message }}</div>@enderror

  <input type="submit" value="Add Student" />
</form>

<a href="/">Back to list</a>
@endsection
