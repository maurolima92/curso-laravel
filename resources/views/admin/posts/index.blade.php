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




<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">

                @foreach ( $posts as $post)
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Title
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Detalhar</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $post->id }}
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{ url("storage/{$post->image}")}}" alt="{{ $post->title }}">
                        </div>
                        <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $post->title }}
                        </div>
                        </div>
                    </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('posts.edit', $post->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-indigo-600 hover:text-indigo-900">Detalhar</a>
                    </td>
                @endforeach
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<hr>



@if (isset($filters))
    {{ $posts->appends($filters)->links() }}
@else
    {{ $posts->links() }}
@endif
@endsection
