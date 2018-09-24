@extends('layouts.master')

@section('content')

<h1>Derniers Posts :</h1>

@forelse($posts as $post)
@if(count($post->picture) > 0)
<div class="card mb-4 shadow-sm">
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">  
            <img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="{{asset('images/'.$post->picture->link)}}" data-holder-rendered="true" alt="{{$post->picture->title}}">
            </a>
        </div>
  @endif
  <div class="card-body">
    <h2><a href="{{url('post', $post->id)}}">{{$post->titre}}</a></h2>
    <p class="card-text">{{$post->description}}</p>
    <div class="d-flex justify-content-between align-items-center">
      <div class="btn-group">
        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
      </div>
      <small class="text-muted">9 mins</small>
    </div>
  </div>
</div>

@empty
<li>Désolé pour l'instant aucun post n'est publié sur le site</li>
@endforelse
</ul>
</br>
@endsection