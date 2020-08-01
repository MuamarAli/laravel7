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
                <div class="card">
                    <div class="card-header">
                        Show
                        <a class="btn btn-danger" href="{{ route('user.index') }}">Back</a>
                    </div>

                    <div class="card-body">
                        Name: {{ $user->name }} <br>
                        Email: {{ $user->email }} <br>
                        Email verified: {{ $user->email_verified_at }} <br>
                        Created Date: {{ $user->created_at }} <br>
                        Updated Date: {{ $user->updated_at }} <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
