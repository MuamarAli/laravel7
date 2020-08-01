@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-danger" href="{{ route('user.index') }}">Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('user.update', $user) }}" method="POST">
                            @csrf
                            @method ('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}"/>
                                @error('name')
                                <p style="color: red">{{ $errors->first('name') }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input name="email" class="form-control" placeholder="Email" value="{{ $user->email }}"/>
                                @error('email')
                                <p style="color: red">{{ $errors->first('email') }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input name="password" class="form-control" placeholder="Password"/>
                                @error('password')
                                <p style="color: red">{{ $errors->first('password') }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
