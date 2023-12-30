<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduserRequest;
use App\Models\produser;
use Illuminate\Http\Request;

class ProduserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = produser::latest()->get();
        return view('produser.index', ['datas' => $datas]);
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
    public function store(ProduserRequest $request)
    {
        $request->validated();

        $lastRecord = produser::latest()->first();
        if ($lastRecord) {
            $lastCodeNumber = intval(substr($lastRecord->code, 2));
            $newCodeNumber = $lastCodeNumber + 1; 
            $newCode = 'PD' . sprintf('%02d', $newCodeNumber);
        } else {
            $newCode = 'PD01';
        }
    
            $data = [
                'code' => $newCode,
                'name' => $request->name, 
                'international' => $request->international, 
            ];
    
            $insert = produser::create($data);
            
            return response()->json([
                'success' => 'Data berhasil disimpan', 
                'data'    => $insert  
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produser  $produser
     * @return \Illuminate\Http\Response
     */
    public function show(produser $produser)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $produser  
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produser  $produser
     * @return \Illuminate\Http\Response
     */
    public function edit(produser $produser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produser  $produser
     * @return \Illuminate\Http\Response
     */
    public function update(ProduserRequest $request, $id)
    {
        $request->validated();

        $produser = produser::find($id);
        $data = [
            'code' => $produser->code,
            'name' => $request->name,
            'international' => $request->international,
        ];
        $produser->update($data);
        return response()->json([ 
            'success' => 'Data Berhasil Diudapte!',
            'data'    => $data,
            'id' => $request->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produser  $produser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = produser::find($id);
        $country->delete();
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
