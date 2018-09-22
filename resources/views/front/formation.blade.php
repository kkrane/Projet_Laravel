@extends('layouts.master')

@section('content')
<h1>Toutes les formations :</h1>
<ul class="list-group">
</br>
{{$posts->links()}}
</br>
@forelse($posts as $post)
<li class="list-group-item">
<h2><a href="{{url('post', $post->id)}}">{{$post->titre}}</a></h2>
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
</li>
@empty
<li>Désolé pour l'instant aucun post n'est publié sur le site</li>
@endforelse
</br>
{{$posts->links()}}
</ul>
</br>
@endsection