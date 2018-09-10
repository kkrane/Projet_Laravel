@extends('layouts.master')

@section('content')
<h1>Tous les posts par categorie {{$categorie->name?? 'aucun genre'}}</h1>
{{$posts->links()}}
<ul class="list-group">
@forelse($posts as $post)
<li class="list-group-item">
<h2><a href="{{url('book', $book->id)}}">{{$post->titre}}</a></h2>
<div class="row">
@if(count($post->picture) > 0)
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
            <img width="171" src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
            </a>
        </div>
@endif
<div class="col-xs-6 col-md-9">
{{$post->description}}
</div>
</div>
@empty
<li>Désolé pour l'instant aucune formation/stage n'est publié sur le site</li>
@endforelse
</ul>
{{$post->links()}}
@endsection 

