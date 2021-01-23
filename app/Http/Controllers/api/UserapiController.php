<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\userapi;
use App\Http\Resources\Userapi as UserapiResource;

class UserapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all data
        $userapi = Userapi::all();
        return new UserapiResource($userapi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create data
        $userapi = new Userapi();
        $userapi->status = $request->input('status');
        $userapi->position = $request->input('position');
        $userapi->save();
        return new UserapiResource($userapi);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get data by id
        $userapi = Userapi::findOrFail($id);
        return new UserapiResource($userapi);
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
        //update data by id
        $userapi = Userapi::findOrFail($id);
        $userapi->status = $request->input('status');
        $userapi->position = $request->input('position');
        $userapi->save();
        return new UserapiResource($userapi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete data by id
        $userapi = Userapi::findOrFail($id);
        if($userapi->delete()){
            return new UserapiResource($userapi);
        }
    }
}
