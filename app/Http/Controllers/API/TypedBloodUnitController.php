<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TypedBloodUnit;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\TypedBloodUnit as TypedBloodUnitResource;
use App\Http\Resources\TypedBloodUnitCollection;


class TypedBloodUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TypedBloodUnitCollection(TypedBloodUnit::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'blood_unit_id' => 'required|string|max:191',
           'ABO' => 'required|string',
           'rh_type' => 'required|string',
        ]);
        return TypedBloodUnit::create([
            'blood_unit_id' => $request['donation_id'],
            'ABO' => $request['ABO'],
            'rh_type' => $request['rh_type']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TypedBloodUnit::findorFail($id);
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
