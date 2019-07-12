<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donor;
use App\Http\Resources\Donor as DonorResource;
use App\Http\Resources\DonorCollection;


use Illuminate\Support\Facades\Hash;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = $request->get('email');
        $donor_id = $request->get('donor_id');

        $query = Donor::query();
    
        if ($email) {
            $query->where('email', $email);
        }
        if($donor_id){
            $query->where('donor_id', $donor_id);
        }
    
        return new DonorCollection($query->get());

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
           'first_name' => 'required|string|max:191',
        ]);
        return Donor::create([
            'donor_id' => $request['donor_id'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email']
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
        return new DonorResource(Donor::FindOrFail($id));
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
        $donor = Donor::findOrFail($id);
        $this->validate($request,[
            'first_name' => 'required|string|max:191',
         ]);
         $donor->update([
             'first_name' => $request['first_name']
         ]);

         return new DonorResource($donor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->delete();
        
        return new DonorResource($post);
 
    }
}
