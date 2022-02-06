@extends('layouts.app')

@section('content')
@if(Session::has('message')) 
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
   <small><a href="{{ route('articles.create') }}">Новая статья</a> </small>
    <h1>Список статей</h1>
    @foreach ($articles as $article)
    <div>
        <a href="{{ route('articles.show', $article) }}">{{$article->name}}</a>
        <a>{{Str::limit($article->body, 200)}}</a>
       <small><a href="{{ route('articles.edit', $article) }}">edit</a> </small>
       <small><a href="{{ route('articles.destroy', $article) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">delete</small>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
       
        {{-- <div>id={{Str::limit($article->id, 200)}}</div> --}}
    </div>
    @endforeach
          {{ $articles->links() }}
@endsection

