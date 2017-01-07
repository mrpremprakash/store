<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;

use Illuminate\Support\Facades\Input;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        if($user_id){
                $user = User::select(
                                'id',
                                'yellow_flag_days',
                                'red_flag_days'
                                )
                        ->find($user_id);
                $result = $user->toArray();
                return response()->json([
                                        'status' => 'success',
                                        'result' => $result
                ]);
        }
        else{
            return response()->json([
                                        'status' => 'no result',
                                        'result' => []
                ]);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('store.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = $id;
        $user = User::find($user_id);
        $user->yellow_flag_days = $request->yellow_flag_days;
        $user->red_flag_days = $request->red_flag_days;
        $user->updated_at = date('Y-m-d H:i:s');
        $result = $user->save();
        if($result){
            return response()->json([
                                            'status' => 'success'
                    ]);
        }
        else{
            return response()->json([
                                        'status' => 'error',
                ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
