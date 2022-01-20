@extends('admin.layouts.app')

@section('title', 'Listagem dos Posts')

@section('content')
<h1>Listagem de posts</h1>

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
    
@endif

<a href="{{ route('posts.create') }}">Novo Post</a>

    <form action=" {{ route('posts.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Filtrar:"> 
        <button type="submit">Pesquisar</button>
    </form>

@foreach ( $posts as $post)
    <img src="{{ url("storage/{$post->image}")}}" alt="{{ $post->title }}" style="max-width:50px!important;">
    <p>{{ $post->id }} | {{ $post->title }} 
        <a href="{{ route('posts.show', $post->id) }}"> Ver</a> 
        <a href="{{ route('posts.edit', $post->id) }}"> Editar</a>
    </p>

@endforeach

<hr>



@if (isset($filters))
    {{ $posts->appends($filters)->links() }}
@else
    {{ $posts->links() }}    
@endif
@endsection