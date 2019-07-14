<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MBDDonation;
use App\Http\Resources\MBDDonationCollection;
use App\Http\Resources\MBDDonation as MBDDonationResource;


class MBDDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      

        $query = MBDDonation::query();
    
        return new MBDDonationCollection($query->get());
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
            'donor_id' => 'required',
            'status' => 'required',
         ]);
         return MBDDonation::create([
             'donor_id' => $request['donor_id'],
             'status' => $request['status'],
             'mbd_id' => $request['mbd_id']
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
        return new MBDDonationResource(MBDDonation::findOrFail($id));
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
        // $donation = Donation::findOrFail($id);
        // $this->validate($request,[
        //     'status' => 'required|string|max:191',
        //  ]);
        //  $blood_unit->update([
        //      'status' => $request['status']
        //  ]);

        //  return response()->json($blood_unit);
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
