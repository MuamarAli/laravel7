@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                <h2>List of Tags</h2>

                <hr />
            </div>

            <div class="col-md-12">
                <a class="btn btn-dark" href="{{ route('tag.create') }}">Add Tag</a>

                <br /><br />

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Updated Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @if (count($tags) === 0)
                        <tr>
                            <td scope="row" colspan="10" class="text-center">No Tags found.</td>
                        </tr>
                    @else
                        @foreach ($tags as $tag)
                            <tr>
                                <th scope="row">{{ $tag->id }}</th>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->email }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td>{{ $tag->updated_at }}</td>
                                <td>
                                    <a href="{{ $tag->path() }}">Show</a>
                                    |
                                    <a href="{{ route('tag.edit', $tag) }}">Edit</a>
                                    |
                                    <a href="{{ route('tag.delete', $tag) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
