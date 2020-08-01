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
                        <a class="btn btn-danger" href="{{ route('tag.index') }}">Back</a>
                    </div>

                    <div class="card-body">
                        Name: {{ $tag->name }} <br>
                        Created Date: {{ $tag->created_at }} <br>
                        Updated Date: {{ $tag->updated_at }} <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
