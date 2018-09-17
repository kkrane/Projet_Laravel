@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1><strong>Title</strong> : {{$post->titre}}</h1>
	<p><strong>Type :</strong>{{$post->post_type}}</p>
        <p><strong>Date de création : </strong> : {{$post->created_at}}</p>
        <p><strong>Date de mise à jour : </strong> : {{$post->updated_at}}</p>
        <p><strong>Status :</strong> : TODO</p>
    </div>
    <div class="col-md-6">
    <h2><strong>Image : </strong></h2>
    @if(!empty($post->picture))
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
            <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
            </a>
        </div>
    @endif
    </div>
</div> 
@endsection 