@extends('layouts.master')

@section('content')
<form action="{{route('post.store')}}" method="post">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-6">
			<h1>Créer un Post : </h1>	
				{{ csrf_field() }}
				<div class="form">
					<div class="form-group">
						<label for="titre">Titre :</label>
		    			<input type="text" name="titre" value="{{old('titre')}}" class="form-control" id="titre" placeholder="Titre du post">
		    			@if($errors->has('titre'))<span class="error">{{$errors->first('titre')}}</span>@endif
					</div>
					<div class="form-group">
						<label for="description">Description</label>
		    			<textarea class="form-control" value="{{old('description')}}" name="description" rows="3">{{old('description')}}</textarea>
		    			@if($errors->has('description')) <span class="error bg-warning">{{$errors->first('description')}}</span>@endif
					</div>
					<div class="form-group">
                        <label for="post_type">Formation :</label>
                        <select class="form-control" id="post_type" name="post_type">
                        <option value="stage">Stage</option>
                        <option value="formation">Formation</option>
                        <option value="undetermined">undetermined</option>
                        </select>
                    </div>
					<div class="form-group">
				      <label for="categorie">Catégorie</label>
				      <select id="categorie" name="category_id" class="form-control">
				        <option value="0" {{ is_null(old('category_id'))? 'selected' : '' }}>Aucun Categorie</option>
				        @foreach($categories as $id => $name)
                            <option {{ old('category_id')==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                        @endforeach
				      </select>
				    </div>
				    <div class="row">
				    	<div class="col-md-6">
						    <div class="form-group">
								<label for="price">Prix :</label>
				    			<input type="text" name="price" value="{{old('price')}}" class="form-control" id="price">
				    			@if($errors->has('price'))<span class="error">{{$errors->first('price')}}</span>@endif
							</div>
						</div>
						<div class="col-md-6">
						    <div class="form-group">
								<label for="nb_max_personne">Nombre d'élèves maximum :</label>
				    			<input type="text" name="nb_max_personne" value="{{old('price')}}" class="form-control" id="nb_max_personne" placeholder="7">
				    			@if($errors->has('nb_max_personne'))<span class="error">{{$errors->first('nb_max_personne')}}</span>@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="start_dt">Commence le:</label>
				    			<input type="date" name="start_dt" value="{{old('start_dt')}}" class="form-control" id="start_dt" placeholder="13/10/2018">
				    			@if($errors->has('start_dt'))<span class="error">{{$errors->first('start_dt')}}</span>@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="end_dt">Termine le:</label>
				    			<input type="date" name="end_dt" value="{{old('end_dt')}}" class="form-control" id="end_dt" placeholder="19/10/2018">
				    			@if($errors->has('end_dt'))<span class="error">{{$errors->first('end_dt')}}</span>@endif
							</div>
						</div>
					</div>
				</div>
				</div>
		<div class="col-md-6">
			<h2>Status : </h1>
			<div class="form-check">
				<input type="radio" @if(old('status')=='published') checked @endif name="status" value="published" checked> publier<br>
            	<input type="radio" @if(old('status')=='unpublished') checked @endif name="status" value="unpublished"> dépulier<br>
			</div>
			<br>
			<div class="input-file">
                <h2>File :</h2>
                <input class="file" type="file" name="picture" >
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Ajouter un post</button>
		</div>
	</div>
</form>

@endsection