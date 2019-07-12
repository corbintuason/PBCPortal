<?php

namespace App\Http\Controllers\API;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProcessedBloodUnit;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ProcessedBloodUnit as ProcessedBloodUnitResource;
use App\Http\Resources\ProcessedBloodUnitCollection;

class ProcessedBloodUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ProcessedBloodUnit::query()->get();

        return new ProcessedBloodUnitCollection($query);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->units[0]);
        $validator = $request->validate([
           'blood_unit_id' => 'required|string|max:191',
           'whole_blood' => 'required|integer',
           'packed_rbc' => 'required|integer',
           'platelet_concentrate' => 'required|integer',
           'ffp' => 'required|integer',
           'cryoprecipitate' => 'required|integer',
           'cryosupernate' => 'required|integer'
        ]);
        if($validator){
            return ProcessedBloodUnit::create([
                'blood_unit_id' => $request['donation_id'],
                'whole_blood' => $request['whole_blood'],
                'packed_rbc' => $request['packed_rbc'],
                'platelet_concentrate' => $request['platelet_concentrate'],
                'ffp' => $request['ffp'],
                'cryoprecipitate' => $request['cryoprecipitate'],
                'cryosupernate' => $request['cryosupernate'],
            ]);  
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ProcessedBloodUnit::findorFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
