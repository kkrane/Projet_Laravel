@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 view-admin">
            <h1>{{$post->titre}}</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
            <div class="col-md-6 view-admin">
            
             @if(!empty($post->picture))
                <a href="#" class="thumbnail">
                <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
                </a>
             @endif
         </div>
         <div class="col-md-6 view-admin">

                <p><strong>Type :</strong>{{$post->post_type}}</p>
                <p><strong>Date de création : </strong> {{$post->created_at->format('d-m-Y')}}</p>
                <p><strong>Date de mise à jour : </strong> {{$post->updated_at->format('d-m-Y')}}</p>

            <p><strong>Description : </strong><br/>{{$post->description}}</p>
        </div>
    </div>
</div>
@endsection 