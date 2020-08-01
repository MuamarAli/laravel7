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
                        Add Article
                        <a class="btn btn-danger" href="{{ route('article.index') }}">Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('article.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}" />
                                @error('title')
                                    <p style="color: red">{{ $errors->first('title') }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Content">Content</label>
                                <textarea name="content" class="form-control" placeholder="Content">{{ old('content') }}</textarea>
                                @error('content')
                                    <p style="color: red">{{ $errors->first('content') }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
