<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Shop_medicine;
use App\Medicine;

use Illuminate\Support\Facades\Input;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id = Auth::user()->shop_id;
        if($shop_id){
                $url_prefix=url('/assets/img/medicines');
                $shop_medicine = Shop_medicine::join('medicine', 'medicine.id', '=', 'shop_medicines.medicine_id')
                        ->select(
                                'shop_medicines.id',
                                'medicine.name',
                                DB::raw("(CONCAT('".$url_prefix."','/',medicine.man_cmp_logo)) as `img`")
                                )
                        ->where('shop_medicines.shop_id','=',$shop_id)->get();
                $res_count= $shop_medicine->count();
                $result = $shop_medicine->toArray();
                return response()->json([
                                        'status' => 'success',
                                        'count' =>$res_count,
                                        'result' => $result
                ]);
        }
        else{
            return response()->json([
                                        'status' => 'no result',
                                        'count' =>0,
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
        echo $request->medicine_id[0];
        print_r($_POST);
        exit();
        
        for($i=0;$i<count($request->medicine_id);$i++){
            $medicine_id = $request->medicine_id[$i];
            $shop_id = 1;//Auth::user()->shop_id;
            if($request->is_shop_medicine[$i]==1){
                $this->__insert_shop_medicine($shop_id, $medicine_id);
            }
        }
        
        $Shop_medicines = new Shop_medicine;

        $Shop_medicines->medicine_id = $request->medicine_id;
        $Shop_medicines->shop_id = Auth::user()->shop_id;
        $Shop_medicines->created_at = date('Y-m-d H:i:s');
        $Shop_medicines->updated_at =  date('Y-m-d H:i:s');
        
        if($Shop_medicines->save()){
            return response()->json([
                                        'status' => 'success',
                ]);
        }
        else{
            return response()->json([
                                        'status' => 'error',
                ]);
        }
    }

    function __insert_shop_medicine($shop_id,$medicine_id){
        $Shop_medicines = new Shop_medicine;

        $Shop_medicines->medicine_id = $medicine_id;
        $Shop_medicines->shop_id = $shop_id;
        $Shop_medicines->created_at = date('Y-m-d H:i:s');
        $Shop_medicines->updated_at =  date('Y-m-d H:i:s');
        
        if($Shop_medicines->save()){
            return 1;
        }
        else{
            return 0;
        }
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
        $Shop_medicines = Shop_medicine::find($id);

        $Shop_medicines->medicine_id = $request->medicine_id;
        $Shop_medicines->shop_id = Auth::user()->shop_id;
        $Shop_medicines->updated_at =  date('Y-m-d H:i:s');
        
        if($Shop_medicines->save()){
            return response()->json([
                                        'status' => 'success',
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
       $deletedShopMedicine = Shop_medicine::where('id', $id)->delete();
       return response()->json([
                                        'status' => 'success',
        ]);
    }
}
