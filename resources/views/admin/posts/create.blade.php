@extends('admin.layouts.app')
@section('title','Novo Post')

@section('content')
    <h1>Novo POSTS</h1>
    <a href="{{ route('posts.index') }}">Listar Posts</a>


    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @include('admin.posts._partials.form');
    </form>
@endsection