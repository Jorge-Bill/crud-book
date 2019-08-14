@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-10">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                @endif
                <div class="card">
                    <div class="card-header">Book List  <a href="{{ route('books.create')}}" class="btn btn-outline-primary float-md-right">New</a></div>

                    <div class="card-body">
                        <table class="table table-striped table-borderless">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Book title</td>
                                <td>ISBN Number</td>
                                <td>Book Price</td>
                                <td colspan="2">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->isbn_no}}</td>
                                    <td>{{$book->book_price}}</td>
                                    <td class="float-md-right">
                                        <form action="{{ route('books.destroy', $book->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                    <td class="float-md-right"><a href="{{ route('books.edit',$book->id)}}" class="btn btn-outline-primary">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
