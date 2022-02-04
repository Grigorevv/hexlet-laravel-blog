@extends('layouts.app')

@section('content')
@if(Session::has('message')) 
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
   <small><a href="{{ route('articles.create') }}">Новая статья</a> </small>
    <h1>Список статей</h1>
    @foreach ($articles as $article)
         <a href="{{ route('articles.show', $article) }}">{{$article->name}}</a>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{Str::limit($article->body, 200)}}</div>
        <div>id={{Str::limit($article->id, 200)}}</div>
    @endforeach
          {{ $articles->links() }}
@endsection

