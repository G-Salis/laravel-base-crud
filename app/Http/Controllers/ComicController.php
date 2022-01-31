<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\AbstractNode;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comicList = Comic::orderBy('id', 'desc')->paginate(5);
        return view('comics.home', compact('comicList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => "required|max:50|min:2",
                'type' => "required|max:20|min:2",
                'thumb' => "required|max:255",
                'series' => "required|max:50|min:2",
                'price' => "required|numeric|min:1",
                'sale_date' => "required|numeric",
            ],
            [
                'title.required' => 'Titolo è un campo obbligatorio',
                'title.max' => 'Titolo deve aver massimo 50 caratteri',
                'title.min' => 'Titolo deve aver minimo 2 caratteri',

                'type.required' => 'Tipo è un campo obbligatorio',
                'type.max' => 'Tipo deve aver massimo 20 caratteri',
                'type.min' => 'Tipo deve aver minimo 2 caratteri',

                'thumb.required' => 'Cover è un campo obbligatorio',
                'thumb.max' => 'URL di Cover deve aver massimo 255 caratteri',
                

                'series.required' => 'Serie è un campo obbligatorio',
                'series.max' => 'Serie deve aver massimo 50 caratteri',
                'series.min' => 'Serie deve aver minimo 2 caratteri',

                'price.required' => 'Prezzo è un campo obbligatorio',
                'price.numeric' => 'Prezzo deve contenere solo numeri',
                'price.min' => 'Prezzo deve aver almeno 1 numero',

                'sale_date.required' => 'Pubblicazione è un campo obbligatorio',
                'sale_date.numeric' => 'Pubblicazione deve contenere solo numeri',
                
                
            ]
        );
        $data = $request->all();

        $new_comic = new Comic();
        $new_comic->title = $data['title'];
        $new_comic->type = $data['type'];
        $new_comic->description = $data['description'];
        $new_comic->thumb = $data['thumb'];
        $new_comic->series = $data['series'];
        $new_comic->price = $data['price'];
        $new_comic->sale_date = $data['sale_date'];
        $new_comic->slug = Str::slug($new_comic->title, '-');

        // $new_comic->fill($data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic);


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $comic = Comic::find($id);
        if($comic){
            return view('comics.show', compact('comic'));
        }
        abort(404, 'Prodotto non presente nel DB');
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.edit', compact('comic'));
        }
        abort(404, 'Prodotto non presente nel DB');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate(
            [
                'title' => "required|max:50|min:2",
                'type' => "required|max:20|min:2",
                'thumb' => "required|max:255",
                'series' => "required|max:50|min:2",
                'price' => "required|numeric|min:1",
                'sale_date' => "required|numeric",
            ],
            [
                'title.required' => 'Titolo è un campo obbligatorio',
                'title.max' => 'Titolo deve aver massimo 50 caratteri',
                'title.min' => 'Titolo deve aver minimo 2 caratteri',

                'type.required' => 'Tipo è un campo obbligatorio',
                'type.max' => 'Tipo deve aver massimo 20 caratteri',
                'type.min' => 'Tipo deve aver minimo 2 caratteri',

                'thumb.required' => 'Cover è un campo obbligatorio',
                'thumb.max' => 'URL di Cover deve aver massimo 255 caratteri',
                

                'series.required' => 'Serie è un campo obbligatorio',
                'series.max' => 'Serie deve aver massimo 50 caratteri',
                'series.min' => 'Serie deve aver minimo 2 caratteri',

                'price.required' => 'Prezzo è un campo obbligatorio',
                'price.numeric' => 'Prezzo deve contenere solo numeri',
                'price.min' => 'Prezzo deve aver almeno 1 numero',

                'sale_date.required' => 'Pubblicazione è un campo obbligatorio',
                'sale_date.numeric' => 'Pubblicazione deve contenere solo numeri',
                
                
            ]
        );
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        $comic->update($data);
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted', "Il Comic $comic->title è stato eliminato");
    }
}
