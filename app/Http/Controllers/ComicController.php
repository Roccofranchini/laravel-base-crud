<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $comics = Comic::all();
        
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //creiamo un'istanza vuota per gestire il doppio form per creare/modificare gli elementi
        $comic = new Comic();

        // Per creare una nuova entità restituiamo una view create con l'apposito form
        return view('comics.create', compact('comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // VALIDAZIONE
        $request->validate([
            'title' => 'required|string|unique:comics|max:255',
            'thumb' => 'required|string|unique:comics|max:255',
            'price' => 'required|numeric|max:255'
        ],
            //messagi degli errori
        [
            'required' =>"You must fill the :attribute field",
            'title.unique' => "Il fumetto $request->title esiste già"
        ]);

        //raccogliamo utti i dati dellla request
        $data = $request->all();
        //creiamo una nuova istanza
        $comic = new Comic();
        //la rempiamo con i dati ricevuti
        // $comic->fill($data);
        //salviamo
        // $comic->save();

        //OPPURE
        $comic = Comic::create($data);
        //restituiamo la view della nuova entità creata
        return redirect()->route('comics.show', $comic-> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::findOrFail($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
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
         // VALIDAZIONE
         $request->validate([
             'price' => 'required|numeric|max:255',
             'description' => 'required|string|max:255',

             'title' => ['required',  'string', Rule::unique('comics')->ignore($comic->id), 'max:255'],
             'thumb' => ['required',  'string', Rule::unique('comics')->ignore($comic->id), 'max:255'],

            ],
            //messagi degli errori
        [
            'required' =>"You must fill the :attribute field",
            'title.unique' => "Il fumetto $request->title esiste già"
        ]);

        $data = $request->all();
        
        $comic->update($data);
        return redirect()->route('comics.show', $comic-> id);
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
        return redirect()->route('comics.index')->with('delete', $comic->title);
    }
}
