@extends('layouts.main')
@section('content')

<div class="container">

 <h1>Nuovo Comic</h1>

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


 <form action="{{route('comics.store')}}" method="POST">
  @csrf
  
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nome Comic</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" name="title" id="title" placeholder="Inserisci Nome">
      @error('title')
      <p class="form-errors">{{$message}}</p>
      @enderror
      
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tipo Comic</label>
      <input type="text" class="form-control @error('type') is-invalid @enderror" value="{{old('type')}}" name="type" id="type" placeholder="Inserisci Tipo">
      @error('type')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Cover Comic</label>
      <input type="text" class="form-control @error('thumb') is-invalid @enderror" value="{{old('thumb')}}" name="thumb" id="thumb" placeholder="Inserisci Cover">
      @error('thumb')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Serie Comic</label>
      <input type="text" class="form-control @error('series') is-invalid @enderror" value="{{old('series')}}" name="series" id="series" placeholder="Inserisci Series">
      @error('series')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Prezzo Comic</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}" id="price" placeholder="Inserisci Prezzo">
      @error('price')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Pubblicazione Comic</label>
      <input type="text" class="form-control @error('sale_date') is-invalid @enderror" value="{{old('sale_date')}}" name="sale_date" id="sale_date" placeholder="Inserisci Data">
      @error('sale_date')
      <p class="form-errors">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Descrizione Comic</label>
      <textarea type="number" class="form-control" value="{{old('description')}}" name="description" id="description" placeholder="Inserisci DEscrizione"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Invia</button>
    <button type="reset" class="btn btn-secondary">RESET</button>
 
 </form>

</div>
  
@endsection