<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donation;
use App\Http\Resources\DonationCollection;
use App\Http\Resources\Donation as DonationResource;


class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      

        $query = Donation::query();
        $donor_id = $request->get('donor_id');
        if($donor_id)
        $query->where('donor_id', $donor_id);

    
        return new DonationCollection($query->get());
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
         return Donation::create([
             'donor_id' => $request['donor_id'],
             'status' => $request['status']
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
        return new DonationResource(Donation::findOrFail($id));
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
        $donation = Donation::findOrFail($id);
        $this->validate($request,[
            'status' => 'required|string|max:191',
         ]);
         $donation->update([
             'status' => $request['status']
         ]);

         return new DonationResource($donation);
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
