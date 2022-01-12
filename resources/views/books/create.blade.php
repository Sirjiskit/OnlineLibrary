@extends('_patials.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Add New Book</h2>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>ISBN:</strong>
                <input type="text" name="ISBN" value="{{ old('ISBN') }}" class="form-control" placeholder="Enter ISBN">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Revision Number:</strong>
                <input type="text" name="revisionNo" value="{{ old('revisionNo') }}" class="form-control" placeholder="Enter Revision Number">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Published Date:</strong>
                <input type="date" name="publishedDate" value="{{ old('publishedDate') }}" class="form-control" placeholder="Enter Published Date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Publisher:</strong>
                <input type="text" name="publisher" value="{{ old('publisher') }}" class="form-control" placeholder="Enter publisher">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Author:</strong>
                <input type="text" name="author" value="{{ old('author') }}" class="form-control" placeholder="Enter Author">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Additional Information:</strong>
                <textarea class="form-control" value="{{ old('genre') }}" style="height:150px" name="genre" placeholder="Enter genre"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Book cover:</strong>
                <input type="file" name="image" class="form-control" placeholder="Enter cover">
                <input type="hidden" name="cover">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-light" href="{{ route('books.index') }}"> Back</a>
        </div>
    </div>

</form>
@endsection
