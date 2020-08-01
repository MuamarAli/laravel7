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
                <h2>List of Articles</h2>

                <hr />
            </div>

            <div class="col-md-12">
                <a class="btn btn-dark" href="{{ route('article.create') }}">Add Article</a>

                <br /><br />

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Updated Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @if (count($articles) === 0)
                        <tr>
                            <td scope="row" colspan="10" class="text-center">No Articles found.</td>
                        </tr>
                    @else
                        @foreach ($articles as $article)
                            <tr>
                                <th scope="row">{{ $article->id }}</th>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->content }}</td>
                                <td>
                                    @foreach ($article->tags as $tag)
                                        {{ $tag->name }}
                                    @endforeach
                                </td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->updated_at }}</td>
                                <td>
                                    <a href="{{ $article->path() }}">Show</a>
                                    |
                                    <a href="{{ route('article.edit', $article) }}">Edit</a>
                                    |
                                    <a href="{{ route('article.delete', $article) }}">Delete</a>
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
