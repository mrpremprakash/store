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

class Shop_medicineController extends Controller
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
                                'shop_medicines.price',
                                'shop_medicines.qty',
                                'shop_medicines.purchase_date',
                                'shop_medicines.exp_date',
                                'medicine.name',
                                'medicine.type',
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
        
        $Shop_medicines = new Shop_medicine;

        $Shop_medicines->medicine_id = $request->medicine_id;
        $Shop_medicines->shop_id = Auth::user()->shop_id;
        $Shop_medicines->price = $request->price;
        $Shop_medicines->qty = $request->qty;
        $Shop_medicines->purchase_date = date('Y-m-d',strtotime(str_replace('/','-',$request->purchase_date)));
        $Shop_medicines->exp_date = date('Y-m-d',  strtotime(str_replace('/','-',$request->exp_date)));
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
