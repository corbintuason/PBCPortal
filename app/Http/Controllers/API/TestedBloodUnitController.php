<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TestedBloodUnit;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\TestedBloodUnit as TestedBloodUnitResource;
use App\Http\Resources\TestedBloodUnitCollection;

class TestedBloodUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = TestedBloodUnit::query()->get();
        
        return new TestedBloodUnitCollection(TestedBloodUnit::all());
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
           'hbSag' => 'required|string',
           'HCV' => 'required|string',
           'HIV' => 'required|string',
           'malaria' => 'required|string',
           'syphilis' => 'required|string',
        ]);
        return TestedBloodUnit::create([
            'blood_unit_id' => $request['donation_id'],
            'hbSag' => $request['hbSag'],
            'HCV' => $request['HCV'],
            'HIV' => $request['HIV'],
            'malaria' => $request['malaria'],
            'syphilis' => $request['syphilis'],
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
        return new TestedBloodUnitCollection(TestedBloodUnit::findorFail($id));
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
