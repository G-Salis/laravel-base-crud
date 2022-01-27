@extends('layouts.main')
@section('content')

<div class="container">
  <h1>
    Comics
  </h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nome</th>
        <th scope="col">Tipo</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($comicList as $comic)
      <tr>
        <th scope="row">{{$comic->id}}</th>
        <td>{{$comic->title}}</td>
        <td>{{$comic->type}}</td>
        <td>
          <div class="button">
            <a href="{{route('comics.show', $comic)}}">show</a>
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$comicList->links()}}
</div>
  
@endsection