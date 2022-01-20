@extends('admin.layouts.app')
@section('title','Novo Post')
@section('content')
    <h1>Editando post <strong>{{ $post->title }}</strong></h1>
    <a href="{{ route('posts.index') }}">Listar Posts</a>

    @if ($errors->any)
        <ul>
            @foreach ( $errors->all() as $error )
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @include('admin.posts._partials.form');
    </form>
@endsection