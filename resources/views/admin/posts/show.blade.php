@extends('admin.layouts.app')
@section('title', 'Artigo')
@section('content')
    <h1>Detalhe do post: {{ $post->title }}</h1>
    <a href="{{ route('posts.index') }}">Listar Posts</a>


    <ul>
        <li><strong>Título</strong>: {{ $post->title }}</li>
        <li><strong>Conteúdo</strong>:{{ $post->content }}</li>
    </ul>

    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Deletar o post: {{ $post->title }} </button>  
    </form> 
@endsection