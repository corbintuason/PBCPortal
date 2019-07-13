<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BloodUnit;
use App\Http\Resources\BloodUnitCollection;
use App\Http\Resources\BloodUnit as BloodUnitResource;
use App\Rules\DonationIDFormat;
use Illuminate\Support\Facades\Hash;

class BloodUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $status = $request->get('status');
        $donor_id = $request->get('donor_id');

        $query = BloodUnit::query();
    
        if ($status) {
            $query->where('status', $status);
        }
        if($donor_id){
            $query->where('donor_id', $donor_id);
        }
    
        return new BloodUnitCollection($query->get());
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
           'donation_id' => new DonationIDFormat,
           'donor_id' => 'required|integer|max:191',
           'quantity' => 'required'
        ]);
        return BloodUnit::create([
            'donation_id' => $request['donation_id'],
            'status' => $request['status'],
            'donor_id' => $request['donor_id'],
            'quantity' => $request['quantity']
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
        return new BloodUnitResource(BloodUnit::findOrFail($id));
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
        $blood_unit = BloodUnit::findOrFail($id);
        
        $this->validate($request,[
            'status' => 'required|string|max:191',
         ]);
         $blood_unit->update([
             'status' => $request['status']
         ]);

         return response()->json($blood_unit);
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
