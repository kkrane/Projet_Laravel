@extends('layouts.master')

@section('content')
<a href="{{route('post.create')}}"><button type="button" class="btn btn-success">Ajouter un livre</button>
</a>
</br>
@include('back.post.partials.flash')
</br>
</br>
{{$posts->links()}}
</br>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Stage/Formation</th>
      <th scope="col">Date de publication</th>
      <th scope="col">Status</th>
      <th scope="col">Editer</th>
      <th scope="col">Show</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  	@forelse($posts as $post)
    <tr>
      <th>{{$post->titre}}</th>
      <td>{{$post->post_type}}</td>
      <td>{{$post->created_at}}</td>
       <td>
                @if($post->status == 'published')
                <button type="button" class="btn btn-info">published</button>
                @else 
                <button type="button" class="btn btn-warning">unpublished</button>
                @endif
       </td>
      <td><a href="{{route('post.edit', $post->id)}}"><button type="button" class="btn btn-success">Modifier</button></a></td>
      <td><a href="{{route('post.show', $post->id)}}">Voir</a></td>
      <td>
        <form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input class="btn btn-danger" type="submit" value="delete" >
        </form>
      </td> 
    </tr>
    @empty
      Aucun titre...
    @endforelse
  </tbody>
</table>
{{$posts->links()}}
@endsection 

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection

