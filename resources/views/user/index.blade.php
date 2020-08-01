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
                <h2>List of Users</h2>

                <hr />
            </div>

            <div class="col-md-12">
                <a class="btn btn-dark" href="{{ route('user.create') }}">Add User</a>

                <br /><br />

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Email Verfied</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Updated Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @if (count($users) === 0)
                        <tr>
                            <td scope="row" colspan="10" class="text-center">No Users found.</td>
                        </tr>
                    @else
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <a href="{{ $user->path() }}">Show</a>
                                    |
                                    <a href="{{ route('user.edit', $user) }}">Edit</a>
                                    |
                                    <a href="{{ route('user.delete', $user) }}">Delete</a>
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
