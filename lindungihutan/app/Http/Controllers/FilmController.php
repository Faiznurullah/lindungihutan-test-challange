<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\artis;
use App\Models\film;
use App\Models\genre;
use App\Models\produser;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = film::latest()->with(['getGenre', 'getArtis', 'getProduser'])->get();
        $genres = genre::latest()->get();
        $artis = artis::latest()->get();
        $produser = produser::latest()->get();
        $meanIncome = $datas->avg('income');
        return view('film.index', ['datas' => $datas, 'meanIncome' => $meanIncome, 'genres' => $genres, 'artis' => $artis, 'produser' => $produser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $request->validated();

        $lastRecord = film::latest()->first();
        if ($lastRecord) {
            $lastCodeNumber = intval(substr($lastRecord->code, 1));
            $newCodeNumber = $lastCodeNumber + 1; 
            $newCode = 'F' . sprintf('%03d', $newCodeNumber);
        } else {
            $newCode = 'F001';
        }
    
            $data = [
                'code' => $newCode,
                'title' => $request->title, 
                'genre' => $request->genre,
                'artis' => $request->artis,
                'produser' => $request->produser,
                'income' => $request->income,
                'nomination' => $request->nomination,
            ];
    
            $insert = film::create($data);
            
            return response()->json([
                'success' => 'Data berhasil disimpan', 
                'data'    => $insert  
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = film::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $film  
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, $id)
    {
        $request->validated();

        $film = film::find($id);

        $data = [
            'code' => $film->code,
            'title' => $request->title,
            'genre' => $request->genre,
            'artis' => $request->artis,
            'produser' => $request->produser,
            'income' => $request->income,
            'nomination' => $request->nomination,
        ];
        $film->update($data);
        return response()->json([ 
            'success' => 'Data Berhasil Diudapte!',
            'data'    => $data,
            'id' => $request->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = film::find($id);
        $country->delete();
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }

    public function getDataByFilter($value){

        if ($value == 1) {
           $data=  film::orderBy('nomination', 'desc')
              ->orderBy('title', 'asc')->with(['getGenre', 'getArtis', 'getProduser'])  
              ->get();
       } elseif ($value == 2) {
            $data = film::where('title', 'LIKE', '%n')->with(['getGenre', 'getArtis', 'getProduser'])->get();
       } elseif ($value == 3) {
           $data = film::where('title', 'LIKE', '%s%')->orderBy('income', 'desc')->with(['getGenre', 'getArtis', 'getProduser'])->get();
       } else {
           $data = film::latest()->with(['getGenre', 'getArtis', 'getProduser'])->get();
       }

       return response()->json($data);

    }
}
