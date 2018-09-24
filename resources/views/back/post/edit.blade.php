@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Modifier un Post : </h1>
                <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form">

                        <div class="form-group">
                            <label for="titre">Titre :</label>
                            <input type="text" name="titre" value="{{$post->titre}}" class="form-control" id="titre"
                                   placeholder="Titre du post">
                            @if($errors->has('titre')) <span class="error bg-warning text-warning">{{$errors->first('titre')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="post_type">Formation :</label>
                            <select class="form-control" id="post_type" name="post_type">
                            <option value="stage" {{ $post->post_type === "stage" ? 'selected' :''}}>Stage</option>
                            <option value="formation" {{ $post->post_type === "formation" ? 'selected' :''}}>Formation</option>
                            <option value="undetermined" {{ $post->post_type === "undetermined" ? 'selected' :''}}>undetermined</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea type="text" name="description"class="form-control">{{$post->description}}</textarea>
                            @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                        </div>
                    </div>
                    <div class="form-select">
                        <label for="categorie">Categorie :</label>
                        <select class="form-control" id="categorie" name="category_id">
                            @foreach($categories as $categorie)

                                <option {{$post->category_id == $categorie->id ? 'selected' : '' }}  value="{{$categorie->id}}">{{$categorie->name}}</option>
                            }
                            }
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" value="{{$post->price}}" class="form-control" id="price"
                               placeholder="Prix">
                        @if($errors->has('price')) <span class="error bg-warning text-warning">{{$errors->first('price')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="nb_max_personne">Nombre de personnes : </label>
                        <input type="text" name="nb_max_personne" value="{{$post->nb_max_personne}}" class="form-control" id="nb_max_personne"
                               placeholder="Nombre de personnes">
                        @if($errors->has('nb_max_personne')) <span class="error bg-warning text-warning">{{$errors->first('nb_max_personne')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="start_dt">Commence le : </label>
                        <input type="date" name="start_dt" value="{{$post->start_dt->format('Y-m-d')}}" class="form-control" id="start_dt">
                        @if($errors->has('start_dt')) <span class="error bg-warning text-warning">{{$errors->first('start_dt')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="end_dt">Termine le : </label>
                        <input type="date" name="end_dt" value="{{$post->end_dt->format('Y-m-d')}}" class="form-control" id="end_dt">
                        @if($errors->has('end_dt')) <span class="error bg-warning text-warning">{{$errors->first('end_dt')}}</span>@endif
                    </div>

            </div><!-- #end col md 6 -->
            <div class="col-md-6">
                <div class="input-radio">
            <h2>Status</h2>
            <input type="radio" @if(old('status')=='published') checked @endif name="status" value="published" checked> publier<br>
            <input type="radio" @if(old('status')=='unpublished') checked @endif name="status" value="unpublished" > dépulier<br>
            </div>
            </br>
            <div class="input-file">
                <h2>File :</h2>
                <label for="genre">Title image :</label>
                <input type="text" name="title_image" value="{{old('title_image')}}">
                <input class="file" type="file" name="picture" >
                @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
            </div>
            </br>
            <div class="form-group">
                <h2>Image associée :</h2>
            </div>
            <div class="form-group">
            <img width="300" src="{{url('images', $post->picture->link)}}" alt="">
            </div>
            </br>
            <button type="submit" class="btn btn-primary">Modifiez un post</button>
            </div><!-- #end col md 6 -->
            </form>
        </div>
@endsection