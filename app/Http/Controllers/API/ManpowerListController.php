<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ManpowerList as ManpowerListResource;
use App\ManpowerList;

class ManpowerListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ManpowerList::query();
        $date_assigned = $request->get('date_assigned');
        $mbd_id = $request->get('mbd_id');
        $id = $request->get('id');
        $mbd_schedule_id = $request->get('mbd_schedule_id');

        if($date_assigned){
            $query->where('date_assigned', $date_assigned);
        }
        if($id){
            $query->where('id', $id);
        }
        if($mbd_schedule_id){
            $query->where('mbd_schedule_id', $mbd_schedule_id);
        }


    
        return ManpowerListResource::collection($query->get());
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
            'admin_id' => 'required|integer',
            'mbd_schedule_id' => 'required|integer'
         ]);
         return ManpowerList::create([
             'admin_id' => $request['admin_id'],
             'mbd_schedule_id' => $request['mbd_schedule_id'],
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
        //
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
