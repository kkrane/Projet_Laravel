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
            
            @if(count($post->picture) > 0)
                <div style="text-align: center;" class="col-xs-6 col-md-12">
                    <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
                </div>
            @endif
            </div>
         <div class="col-md-6 view-admin">
                <p><strong>Prix : </strong>{{$post->price}}</p>
                <p><strong>Nombre de personnes : </strong>{{$post->nb_max_personne}}</p>
                <p><strong>Type : </strong>{{$post->post_type}}</p>
                <p><strong>Date de création : </strong> {{$post->created_at->format('d-m-Y')}}</p>
                <p><strong>Date de mise à jour : </strong> {{$post->updated_at->format('d-m-Y')}}</p>

            <p><strong>Description : </strong><br/>{{$post->description}}</p>
        </div>
    </div>
</div>

<!-- <article class="row">
    <div class="col-md-12">
    @if(count($post)>0)
    <h1>{{$post->title}}</h1>
    @if(count($post->picture) > 0)
        <div class="col-xs-6 col-md-12">
            <h2>{{$post->titre}}</h2>
        </div>
        <div style="text-align: center;" class="col-xs-6 col-md-12">
            <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
        </div>
    @endif
    <div class="col-xs-6 col-md-12">
    <h2>Description :</h2>
    {{$post->description}} 
    </div>
    </br>
    <div class="col-xs-6 col-md-12">
            <p>Prix : {{$post->price}}</p>
    </div> 
    <div class="col-xs-6 col-md-12">
            <p>Nombre de personnes : {{$post->nb_max_personne}}</p>
    </div>  
    <div class="col-xs-6 col-md-12">
            <p>Commence le : {{$post->start_dt}}</p>
    </div>  
    <div class="col-xs-6 col-md-12">
            <p>Termine le : {{$post->end_dt}}</p>
    </div>  
    @else 
    <h1>Désolé aucun post</h1>
    @endif 
 </li>
    </div>
</article>

</ul> -->
@endsection 