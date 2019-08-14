@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Book
                        <a href="/books" class="btn btn-light float-md-right" role="button">Back</a>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <form method="post" action="{{ route('books.update', $book->id) }}">
                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label for="name">Book Name:</label>
                                <input type="text" class="form-control" name="title" value="{{$book->title}}"/>
                            </div>
                            <div class="form-group">
                                <label for="price">Book ISBN Number :</label>
                                <input type="text" class="form-control" name="isbn_no" value="{{$book->isbn_no}}"/>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Book Price :</label>
                                <input type="text" class="form-control" name="book_price" value="{{$book->book_price}}"/>
                            </div>
                            <button type="submit" class="btn btn-outline-primary float-md-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
