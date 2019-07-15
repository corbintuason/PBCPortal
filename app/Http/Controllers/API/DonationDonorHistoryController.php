<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DonationDonorHistory as DonationDonorHistoryResource;
use App\Http\Resources\DonationDonorHistoryCollection;
use App\DonationDonorHistory;

class DonationDonorHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $query = DonationDonorHistory::query();
    
        return new DonationDonorHistoryCollection($query->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'donation_id' => 'required|integer', 
            'answer_1' => 'required|boolean', 
            'answer_2' => 'required|boolean', 
            'answer_3' => 'required|boolean',
            'answer_4' => 'required|boolean', 
            'answer_5' => 'required|boolean', 
            'answer_6' => 'required|boolean',
            'answer_7' => 'required|boolean', 
            'answer_8' => 'required|boolean', 
            'answer_9' => 'required|boolean',
            'answer_10' => 'required|boolean', 
            'answer_11' => 'required|boolean', 
            'answer_12' => 'required|boolean',
            'answer_13' => 'required|boolean', 
            'answer_14' => 'required|boolean', 
            'answer_15' => 'required|boolean',
            'answer_16' => 'required|boolean', 
            'answer_17' => 'required|boolean', 
            'answer_18' => 'required|boolean',
            'answer_19' => 'required|boolean', 
            'answer_20' => 'required|boolean', 
            'answer_21' => 'required|boolean',
            'answer_22' => 'required|boolean', 
            'answer_23' => 'required|boolean', 
            'answer_24' => 'required|boolean',
            'answer_25' => 'required|boolean', 
            'answer_26' => 'required|boolean', 
            'verdict' => 'required|string', 
            'remarks'=> 'string',
         ]);
         return DonationDonorHistory::create([
            'donation_id' => $request['donation_id'], 
            'answer_1' => $request['answer_1'], 
            'answer_2' => $request['answer_2'], 
            'answer_3' => $request['answer_3'],
            'answer_4' => $request['answer_4'], 
            'answer_5' => $request['answer_5'], 
            'answer_6' => $request['answer_6'],
            'answer_7' => $request['answer_7'], 
            'answer_8' => $request['answer_8'], 
            'answer_9' => $request['answer_9'],
            'answer_10' => $request['answer_10'], 
            'answer_11' => $request['answer_11'], 
            'answer_12' => $request['answer_12'],
            'answer_13' => $request['answer_13'], 
            'answer_14' => $request['answer_14'], 
            'answer_15' => $request['answer_15'],
            'answer_16' => $request['answer_16'], 
            'answer_17' => $request['answer_17'], 
            'answer_18' => $request['answer_18'],
            'answer_19' => $request['answer_19'], 
            'answer_20' => $request['answer_20'], 
            'answer_21' => $request['answer_21'],
            'answer_22' => $request['answer_22'], 
            'answer_23' => $request['answer_23'], 
            'answer_24' => $request['answer_24'],
            'answer_25' => $request['answer_25'], 
            'answer_26' => $request['answer_26'], 
            'verdict' => $request['verdict'], 
            'remarks'=> $request['remarks'],
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
        return new DonationDonorHistoryResource(DonationDonorHistory::findOrFail($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
