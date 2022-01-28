@extends('layouts.main')
@section('content')

<div class="container">
 <h1>{{$comic->title}}</h1>

 <form action="{{route('comics.update', $comic)}}" method="POST">
  @csrf
  @method('PUT')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nome Comic</label>
      <input type="text" value="{{$comic->title}}" class="form-control" name="title" id="title" placeholder="Inserisci Nome">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tipo Comic</label>
      <input type="text" value="{{$comic->type}}" class="form-control" name="type" id="type" placeholder="Inserisci Tipo">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Cover Comic</label>
      <input type="text" value="{{$comic->thumb}}" class="form-control" name="thumb" id="thumb" placeholder="Inserisci Cover">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Serie Comic</label>
      <input type="text" value="{{$comic->series}}" class="form-control" name="series" id="series" placeholder="Inserisci Series">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Prezzo Comic</label>
      <input type="text" value="{{$comic->price}}" class="form-control" name="price" id="price" placeholder="Inserisci Prezzo">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Pubblicazione Comic</label>
      <input type="text" value="{{$comic->sale_date}}" class="form-control" name="sale_date" id="sale_date" placeholder="Inserisci Data">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Descrizione Comic</label>
      <textarea type="number" value="{{$comic->description}}" class="form-control" name="description" id="description" placeholder="Inserisci Descrizione"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Invia</button>
    <button type="reset" class="btn btn-secondary">RESET</button>
 </form>

</div>
  
@endsection