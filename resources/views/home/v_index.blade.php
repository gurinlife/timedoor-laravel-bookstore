@extends('v_template')

@section('main')
  <div class="container mt-5">
    @if (!empty($books))
    <form action="{{ url()->current() }}" method="get">
      <div class="row">
        <div class="col-sm-2"><label for="input__list-shown" class="form-label">List shown</label></div>
        <div class="col-sm-3">
          <select class="form-control form-control-sm" name="list_shown" id="input__list-shown">
            @for ($i = $min_list; $i <= $max_list; $i = $i + 10)
            <option value="{{ $i }}" {{ Request::input('list_shown') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
          </select>
        </div>
      </div>
      <div class="mb-3"></div>
      <div class="row">
        <div class="col-sm-2"><label for="input__search" class="form-label">Search</label></div>
        <div class="col-sm-3">
          <input type="text" class="form-control form-control-sm" name="search" id="input__search" value="{{ Request::input('search') }}" />
        </div>
      </div>
      <div class="mb-3"></div>
      <div class="row">
        <div class="col-sm-3 offset-sm-2">
          <button type="submit" class="btn btn-primary btn-sm w-100">SUBMIT</button>
        </div>
      </div>
    </form>
    <div class="mb-5"></div>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Book Name</th>
          <th>Category Name</th>
          <th>Author Name</th>
          <th>Average Rating</th>
          <th>Voter</th>
        </tr>
      </thead>
      <tbody>
        @php ( $i = 1 )
        @foreach ($books as $val)
        <tr>
          <td scope="row">{{ $i }}</td>
          <td>{{ $val->book_name }}</td>
          <td>{{ $val->category_name }}</td>
          <td>{{ $val->author_name }}</td>
          <td>{{ number_format($val->average_rate, 2, '.', ',') }}</td>
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