<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\country;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $datas = country::latest()->get(); 
        return view('country.index', ['datas' => $datas]);
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
    public function store(CountryRequest $request)
    {
       $request->validated();
       

        $data = [
            'code' => $request->code,
            'name' => $request->name, 
        ];

        $insert = country::create($data);
        
        return response()->json([
            'success' => 'Data berhasil disimpan', 
            'data'    => $insert  
        ]);

    }
    
     
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\country  $country
    * @return \Illuminate\Http\Response
    */
    public function show(country $country)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $country  
        ]); 
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\country  $country
    * @return \Illuminate\Http\Response
    */
    public function edit(country $country)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\country  $country
    * @return \Illuminate\Http\Response
    */
    public function update(CountryRequest $request, $id)
    {
        $request->validated();
        
        $country = country::find($id);
        $data = [
            'code' => $request->code,
            'name' => $request->name,
        ];
        $country->update($data);

        

        //return response
        return response()->json([ 
            'success' => 'Data Berhasil Diudapte!',
            'data'    => $data,
            'id' => $request->id
        ]);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\country  $country
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        
        $country = country::find($id);
        $country->delete();
        
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
