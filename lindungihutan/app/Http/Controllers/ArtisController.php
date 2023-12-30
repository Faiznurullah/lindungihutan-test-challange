<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtisRequest;
use App\Models\artis;
use App\Models\country;
use Illuminate\Http\Request;

class ArtisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $countries = country::all();
         $datas = artis::latest()->get(); 
         return view('artis.index', ['datas' => $datas, 'country' => $countries]);
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
    public function store(ArtisRequest $request)
    {
        $request->validated();

        $lastRecord = artis::latest()->first();
        if ($lastRecord) {
            $lastCodeNumber = intval(substr($lastRecord->code, 1));
            $newCodeNumber = $lastCodeNumber + 1; 
            $newCode = 'A' . sprintf('%03d', $newCodeNumber);
        } else {
            $newCode = 'A001';
        }
    
            $data = [
                'code' => $newCode,
                'name' => $request->name, 
                'gender' => $request->gender,
                'salary' => $request->salary,
                'award' => $request->award,
                'country' => $request->country,
            ];
    
            $insert = artis::create($data);
            
            return response()->json([
                'success' => 'Data berhasil disimpan', 
                'data'    => $insert  
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artis  $artis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artis = artis::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $artis  
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artis  $artis
     * @return \Illuminate\Http\Response
     */
    public function edit(artis $artis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artis  $artis
     * @return \Illuminate\Http\Response
     */
    public function update(ArtisRequest $request, $id)
    {
        $request->validated();

        $artis = artis::find($id);
        $data = [
            'code' => $artis->code,
            'name' => $request->name,
            'gender' => $request->gender,
            'salary' => $request->salary,
            'award' => $request->award,
            'country' => $request->country,
        ];
        $artis->update($data);
        return response()->json([ 
            'success' => 'Data Berhasil Diudapte!',
            'data'    => $data,
            'id' => $request->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artis  $artis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = artis::find($id);
        $country->delete();
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }

    public function getDataByFilter($value){

        if ($value == 1) {
             $data = Artis::doesntHave('films')->get();
        } elseif ($value == 2) {
             $data = Artis::withCount('films')->get();
        } elseif ($value == 3) {
            $data = Artis::whereHas('films', function ($query) {
                $query->whereHas('getGenre', function ($subQuery) {
                    $subQuery->where('name', 'Drama');
                });
            })->get();
        } else {
            $data = artis::latest()->get();
        }

        return response()->json($data);

    }
}
