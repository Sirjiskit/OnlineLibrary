@extends('_patials.layout')
@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ $title  }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('books.create') }}"> Add New Book</a>
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
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->title }}</td>
        <td>{{ \Str::limit($value->ISBN, 100) }}</td>
        <td>
            <form action="{{ route('books.destroy',$value->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('books.show',$value->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('books.edit',$value->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{!! $data->links() !!}
@endsection
