<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = genre::latest()->get();
        return view('genre.index', ['datas' => $datas]);
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
    public function store(GenreRequest $request)
    {
        $request->validated();

        $lastRecord = genre::latest()->first();
    if ($lastRecord) {
        $lastCodeNumber = intval(substr($lastRecord->code, 1));
        $newCodeNumber = $lastCodeNumber + 1; 
        $newCode = 'G' . sprintf('%03d', $newCodeNumber);
    } else {
        $newCode = 'G001';
    }

        $data = [
            'code' => $newCode,
            'name' => $request->name, 
        ];

        $insert = genre::create($data);
        
        return response()->json([
            'success' => 'Data berhasil disimpan', 
            'data'    => $insert  
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(genre $genre)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $genre  
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $id)
    {
        $request->validated();

        $genre = genre::find($id);
        $data = [
            'code' => $genre->code,
            'name' => $request->name,
        ];
        $genre->update($data);
        return response()->json([ 
            'success' => 'Data Berhasil Diudapte!',
            'data'    => $data,
            'id' => $request->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = genre::find($id);
        $country->delete();
        
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
