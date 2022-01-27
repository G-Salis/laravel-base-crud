@extends('layouts.main')
@section('content')

<div class="container">
  <h1>
    {{$comic->name}}
  </h1>
  <a href="{{route('comics.index')}}">Home</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Titolo</th>
        <th scope="col">Tipo</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Cover</th>
        <th scope="col">Serie</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Pubblicazione</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <th scope="row">{{$comic->id}}</th>
        <td>{{$comic->title}}</td>
        <td>{{$comic->type}}</td>
        <td>{{$comic->description}}</td>
        <td>{{$comic->thumb}}</td>
        <td>{{$comic->series}}</td>
        <td>{{$comic->price}}</td>
        <td>{{$comic->sale_date}}</td>
      </tr>
      
    </tbody>
  </table>
</div>
  
@endsection