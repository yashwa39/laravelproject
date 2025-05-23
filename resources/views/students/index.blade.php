@extends('layout')

@section('content')
<a href="/add">+ Add New Student</a>

@if(count($students) == 0)
  <p>No students found.</p>
@else
<table>
  <thead>
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Actions</th></tr>
  </thead>
  <tbody>
    @foreach($students as $student)
      <tr>
        <td>{{ $student['id'] }}</td>
        <td>{{ $student['name'] }}</td>
        <td>{{ $student['email'] }}</td>
        <td>{{ $student['age'] }}</td>
        <td class="actions">
          <a href="/edit/{{ $student['id'] }}">Edit</a> |
          <form method="POST" action="/delete/{{ $student['id'] }}" style="display:inline;" onsubmit="return confirm('Delete this student?');">
            @csrf
            <button type="submit" style="background:none; color:#ee6c4d; border:none; cursor:pointer;">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endif
@endsection
