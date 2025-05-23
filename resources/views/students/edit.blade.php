@extends('layout')

@section('content')
<h2>Edit Student #{{ $student['id'] }}</h2>

<form method="POST" action="/edit/{{ $student['id'] }}">
  @csrf
  <label>Name:</label>
  <input type="text" name="name" value="{{ old('name', $student['name']) }}" required />
  @error('name')<div style="color:red;">{{ $message }}</div>@enderror

  <label>Email:</label>
  <input type="email" name="email" value="{{ old('email', $student['email']) }}" required />
  @error('email')<div style="color:red;">{{ $message }}</div>@enderror

  <label>Age:</label>
  <input type="number" name="age" value="{{ old('age', $student['age']) }}" required />
  @error('age')<div style="color:red;">{{ $message }}</div>@enderror

  <input type="submit" value="Update Student" />
</form>

<a href="/">Back to list</a>
@endsection
