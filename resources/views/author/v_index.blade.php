@extends('v_template')

@section('main')
  <div class="container mt-5">
  @if (!empty($authors))
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Author Name</th>
          <th>Voter</th>
        </tr>
      </thead>
      <tbody>
        @php ( $i = 1 )
        @foreach ($authors as $val)
        <tr>
          <td scope="row">{{ $i }}</td>
          <td>{{ $val->author_name }}</td>
          <td>{{ $val->voter }}</td>
        </tr>
        @php ( $i++ )
        @endforeach
      </tbody>
    </table>
    @else
    <div class="alert alert-warning" role="alert">
      <p class="mb-0">Data is unavailable</p>
    </div>
    @endif
  </div>
@endsection