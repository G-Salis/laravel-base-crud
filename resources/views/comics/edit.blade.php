@extends('layouts.main')
@section('content')

<div class="container">
 <h1>{{$comic->title}}</h1>

 @if ($errors->any())
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
      @endforeach
    </ul>
  </div>
@endif

 <form action="{{route('comics.update', $comic)}}" method="POST">
  @csrf
  @method('PUT')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nome Comic</label>
      <input type="text" value="{{$comic->title}}" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Inserisci Nome">
      @error('title')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tipo Comic</label>
      <input type="text" value="{{$comic->type}}" class="form-control @error('type') is-invalid @enderror" name="type" id="type" placeholder="Inserisci Tipo">
      @error('type')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Cover Comic</label>
      <input type="text" value="{{$comic->thumb}}" class="form-control @error('thumb') is-invalid @enderror" name="thumb" id="thumb" placeholder="Inserisci Cover">
      @error('thumb')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Serie Comic</label>
      <input type="text" value="{{$comic->series}}" class="form-control @error('series') is-invalid @enderror" name="series" id="series" placeholder="Inserisci Series">
      @error('series')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Prezzo Comic</label>
      <input type="text" value="{{$comic->price}}" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Inserisci Prezzo">
      @error('price')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Pubblicazione Comic</label>
      <input type="text" value="{{$comic->sale_date}}" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" id="sale_date" placeholder="Inserisci Data">
      @error('sale_date')
      <p class="form-errors">{{$message}}</p>
      @enderror
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