@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Derniers postes : </h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
	@forelse($posts as $post)
	<div class="col-md-4">
	<div class="card mb-4 shadow-sm">
	@if(count($post->picture) > 0)
	    <a href="#" class="thumbnail">  
	    <img class="card-img-top" style="width: 100%; display: block;" src="{{asset('images/'.$post->picture->link)}}" data-holder-rendered="true" alt="{{$post->picture->title}}">
	    </a>
	  @endif
	  <div class="card-body">
	    <h2><a href="{{url('post', $post->id)}}">{{$post->titre}}</a></h2>
	    <p>Prix : {{$post->price}} €</p>
	    <p>Nombre de place : {{$post->nb_max_personne}}</p>
	    <p>Commence le : {{$post->start_dt->format('d-m-Y')}}</p>
	  </div>
	</div>
	</div>

@empty
<p>Aucun post publié</p>
@endforelse
	</div>
</div>
@endsection