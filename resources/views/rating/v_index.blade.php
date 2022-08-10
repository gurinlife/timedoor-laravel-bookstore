@extends('v_template')

@section('main')
  <div class="container mt-5">
    <form action="{{ route('ratingAdd') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-2"><label for="input__author" class="form-label">Book Author</label></div>
        <div class="col-sm-3">
          <select class="form-control form-control-sm" name="author" id="input__author">
            <option value="">Select author</option>
            @foreach($authors as $val)
            <option value="{{ $val->author_id }}">{{ $val->author_name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="mb-3"></div>
      <div class="row">
        <div class="col-sm-2"><label for="input__book" class="form-label">Book Name</label></div>
        <div class="col-sm-3">
          <select class="form-control form-control-sm" name="book" id="input__book">
            <option value="">Select author first</option>
          </select>
        </div>
      </div>
      <div class="mb-3"></div>
      <div class="row">
        <div class="col-sm-2"><label for="input__rating" class="form-label">Rating</label></div>
        <div class="col-sm-3">
          <select class="form-control form-control-sm" name="rating" id="input__rating">
            @for ($i = 1; $i <= 10; $i++)
            <option value="{{ $i }}" {{ Request::input('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
          </select>
        </div>
      </div>
      <div class="mb-3"></div>
      <div class="row">
        <div class="col-sm-3 offset-sm-2">
          <button type="submit" class="btn btn-primary btn-sm w-100">SUBMIT</button>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('btmSlot')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $(function() {


    $('#input__author').on('change', function() {
      const author_id = $(this).val();

      

      $.ajax({
        type: "post",
        url: "{{ route('ratingAjakGetBooks') }}",
        data: {
          "author_id": author_id
        },
        dataType: "json",
        success: function (response) {
          let books = [];

          books.push('<option value="">Select book</option>');

          for (let i in response) {
            books.push(`<option value="${response[i].book_id}">${response[i].book_name}</option>`);
          }

          $('#input__book').html(books.join(''));
        }
      });
    })
  });
</script>
@endsection