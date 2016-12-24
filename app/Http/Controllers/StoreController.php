<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Validator;
use App\Shop;
use App\Shop_keywords;
use App\Cities;
use App\Keywords;
use App\Shop_categories_mapping;
use App\Shop_keywords_mapping;
use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input_type = Input::get('type');
        if($input_type=='json'){
                $keyword = Input::get('keyword');
                $query = "status=1 AND MATCH (address) AGAINST ('$keyword')";
                // $query looks like 
                // MATCH (first_name, last_name, email) AGAINST ('+jar* +eitni*' IN BOOLEAN MODE)

                $shop = Shop::LeftJoin('cities', 'cities.city_id', '=', 'shop.city_id')
                        ->select('shop.*','cities.city_name','cities.city_state AS state_name')
                        ->whereRaw($query)->get();
                $res_count= $shop->count();
                $result = $shop->toArray();
                return response()->json([
                                        'status' => 'success',
                                        'count' =>$res_count,
                                        'result' => $result
                ]);
        }
        else{
            $stores = Shop::LeftJoin('shop_keywords', 'shop.id', '=', 'shop_keywords.shop_id')
                    ->groupBy('shop.id')
                     ->select('shop.*'
                             ,DB::raw("(GROUP_CONCAT(shop_keywords.name SEPARATOR '<br>')) as `keywords_name`")
                             ,DB::raw("(GROUP_CONCAT(shop_keywords.id)) as `keywords_id`")
                             )
                    ->paginate();
            /*echo "<pre>";
            print_r($stores);exit();*/
            
            return view('store.list',  compact('stores'));
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = Shop::count();
        $Cities = Cities::select('city_id', 'city_name')->get();
        $keywords = Keywords::select('name','type')->get();
        return view('store.add',  compact('Cities','shop','keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$check_keyword = Keywords::where('name','hospitalaa')->get();
        //echo $check_keyword->count();exit();
        $messages = [
            'store_name.required' => 'Name is required',
            'store_city.required' => 'City is required',
        ];
        $validator = Validator::make($request->all(), [
            'store_name' => 'required',
            'store_city' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect('store/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        //$name_string = strtolower(trim($request->store_name))."-".strtolower(trim($request->city_name));
        //$name_string = str_replace(' ', '-', $name_string);
        $name_string = trim($request->store_name)
                        ." ".trim($request->address1)
                        ." ".trim($request->address2)
                        ." ".trim($request->city_name)
                        ." ".trim($request->store_zip);
        $name_string = $this->__make_slug($name_string);
        
        $check_slug = Shop::where('slug','=',$name_string)->count();
        $max_slug_id = Shop::max('id');
        if($check_slug!=0){
            $name_string = $name_string."_".$max_slug_id;
        }
        $latlong=array("0","0");
        $latlong=  explode(',', $request->lat_long);
        
        if(count($latlong)==1){
            $latlong=array("0","0");
        }
        $ratingArr = array(1,2,3,4,5);
        $rating = array_rand($ratingArr);
        
        
        $Shop = new Shop;

        $Shop->name = $request->store_name;
        $Shop->slug = $name_string;
        $Shop->city_id = $request->store_city;
        $Shop->address = $request->store_address;
        $Shop->zip_code = $request->store_zip;
        $Shop->primary_phone_no = $request->primary_phone_no;
        $Shop->alternate_phone_no = $request->alternate_phone_no;
        $Shop->latitude = $latlong[0];
        $Shop->longitude = $latlong[1];
        $Shop->email_id = $request->email_id;
        $Shop->modes_of_payment = $request->modes_of_payment;
        $Shop->open_hours = $request->open_hours;
        $Shop->rating = $rating;
        $Shop->status = $request->status;
        $Shop->is_verified = $request->is_verified;
        $Shop->created_at = date('Y-m-d H:i:s');
        $Shop->updated_at =  date('Y-m-d H:i:s');
        
    if($Shop->save()){
        if($request->keywords){
            $keywords=  explode(',', $request->keywords);
            $keyword_arr=array();
            foreach ($keywords as $keyword_val){
                $check_keyword = Keywords::where('name',$keyword_val)->get();
                if($check_keyword->count()!=0){
                   $keyword_arr[]=array(
                                    'keyword_id'=>$check_keyword[0]->id,
                                    "shop_id"=>$Shop->id,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                ); 
                }
                else{
                    $Keyword = new Keywords;
                    $Keyword->name = strtolower($keyword_val);
                    $Keyword->created_at = date('Y-m-d H:i:s');
                    $Keyword->updated_at = date('Y-m-d H:i:s');
                    if($Keyword->save()){
                       $keyword_arr[]=array(
                                    'keyword_id'=>$Keyword->id,
                                    "shop_id"=>$Shop->id,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                );  
                    }
                }
            }
            $keyword_res = Shop_keywords_mapping::insert($keyword_arr);
            
        }
        if($request->shop_type){
            $keywords=  explode(',', $request->shop_type);
            $keyword_arr=array();
            foreach ($keywords as $keyword_val){
                $check_keyword = Keywords::where('name',$keyword_val)->get();
                if($check_keyword->count()!=0){
                   $keyword_arr[]=array(
                                    'keyword_id'=>$check_keyword[0]->id,
                                    "shop_id"=>$Shop->id,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                ); 
                }
                else{
                    $Keyword = new Keywords;
                    $Keyword->name = strtolower($keyword_val);
                    $Keyword->created_at = date('Y-m-d H:i:s');
                    $Keyword->updated_at = date('Y-m-d H:i:s');
                    if($Keyword->save()){
                       $keyword_arr[]=array(
                                    'keyword_id'=>$Keyword->id,
                                    "shop_id"=>$Shop->id,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                );  
                    }
                }
            }
            $keyword_shoptype_res = Shop_categories_mapping::insert($keyword_arr);
            
        }
        
        
        $request->session()->flash('alert-success', 'Shop added successfully!');
        return redirect()->route("store.create");
    }
    else{
        $request->session()->flash('alert-danger', 'Unable to add Shop!');
        return redirect()->route("store.create");
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
    {
        $Cities = Cities::select('city_id', 'city_name')->get();
        $keywords = Keywords::select('name','type')->get();
        $shop = Shop::LeftJoin('shop_keywords', 'shop.id', '=', 'shop_keywords.shop_id')
                    ->LeftJoin('shop_keywords_mapping', 'shop_keywords_mapping.shop_id', '=', 'shop.id')
                    ->LeftJoin('keywords', 'keywords.id', '=', 'shop_keywords_mapping.keyword_id')
                    ->LeftJoin('shop_categories_mapping', 'shop_categories_mapping.shop_id', '=', 'shop.id')
                    ->LeftJoin('keywords AS cat_keyword', 'cat_keyword.id', '=', 'shop_categories_mapping.keyword_id')
                    ->where('shop.id',$id)
                    ->groupBy('shop.id')
                     ->select('shop.*'
                             ,DB::raw("(GROUP_CONCAT(DISTINCT(shop_keywords.name) SEPARATOR ',')) as `keywords_name`")
                             ,DB::raw("(GROUP_CONCAT(DISTINCT(cat_keyword.name) SEPARATOR ',')) as `categories`")
                             ,DB::raw("(GROUP_CONCAT(DISTINCT(keywords.name) SEPARATOR ',')) as `keywords`")
                             )
                    ->get();
        /*echo "<pre>";
        print_r($shop);
        exit();*/
        return view('store.edit',  compact('Cities','shop','keywords'));
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
        $messages = [
            'store_name.required' => 'Name is required',
            'store_city.required' => 'City is required',
        ];
        $validator = Validator::make($request->all(), [
            'store_name' => 'required',
            'store_city' => 'required',
        ], $messages);

        if ($validator->fails()) {   
            return redirect('store/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $name_string = trim($request->store_name)
                        ." ".trim($request->address1)
                        ." ".trim($request->address2)
                        ." ".trim($request->city_name)
                        ." ".trim($request->store_zip);
        $name_string = $this->__make_slug($name_string);
        //$name_string = strtolower(trim($request->store_name))."-".strtolower(trim($request->city_name));
        //$name_string = str_replace(' ', '-', $name_string);
        
        $check_slug = Shop::where('slug','=',$name_string)->where('id','!=',$id)->count();
        $max_slug_id = Shop::max('id');
        if($check_slug!=0){
            $name_string = $name_string."-".$max_slug_id;
        }
        $latlong=array("0","0");
        $latlong=  explode(',', $request->lat_long);
        
        if(count($latlong)==1){
            $latlong=array("0","0");
        }
        $ratingArr = array(1,2,3,4,5);
        $rating = array_rand($ratingArr);
        
        $Shop = Shop::find($id);
        
        $Shop->name = $request->store_name;
        $Shop->slug = $name_string;
        $Shop->city_id = $request->store_city;
        $Shop->address = $request->store_address;
        $Shop->address1 = $request->address1;
        $Shop->address2 = $request->address2;
        $Shop->zip_code = $request->store_zip;
        $Shop->primary_phone_no = $request->primary_phone_no;
        $Shop->alternate_phone_no = $request->alternate_phone_no;
        $Shop->latitude = $latlong[0];
        $Shop->longitude = $latlong[1];
        $Shop->email_id = $request->email_id;
        $Shop->rating = $rating;
        $Shop->status = $request->status;
        $Shop->modes_of_payment = $request->modes_of_payment;
        $Shop->open_hours = $request->open_hours;
        $Shop->is_verified = $request->is_verified;
        //$Shop->created_at = date('Y-m-d H:i:s');
        $Shop->updated_at =  date('Y-m-d H:i:s');
        
    if($Shop->save()){
        if($request->keywords){
            $deletedRows = Shop_keywords_mapping::where('shop_id', $id)->delete();
            $keywords=  explode(',', $request->keywords);
            $keyword_arr=array();
            foreach ($keywords as $keyword_val){
                $check_keyword = Keywords::where('name',$keyword_val)->get();
                if($check_keyword->count()!=0){
                   $keyword_arr[]=array(
                                    'keyword_id'=>$check_keyword[0]->id,
                                    "shop_id"=>$Shop->id,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                ); 
                }
                else{
                    $Keyword = new Keywords;
                    $Keyword->name = strtolower($keyword_val);
                    $Keyword->created_at = date('Y-m-d H:i:s');
                    $Keyword->updated_at = date('Y-m-d H:i:s');
                    if($Keyword->save()){
                       $keyword_arr[]=array(
                                    'keyword_id'=>$Keyword->id,
                                    "shop_id"=>$Shop->id,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                );  
                    }
                }
            }
            $keyword_res = Shop_keywords_mapping::insert($keyword_arr);
            
        }
        if($request->shop_type){
            $deletedRows = Shop_categories_mapping::where('shop_id', $id)->delete();
            $keywords=  explode(',', $request->shop_type);
            $keyword_arr=array();
            foreach ($keywords as $keyword_val){
                $check_keyword = Keywords::where('name',$keyword_val)->get();
                if($check_keyword->count()!=0){
                   $keyword_arr[]=array(
                                    'keyword_id'=>$check_keyword[0]->id,
                                    "shop_id"=>$Shop->id,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                ); 
                }
                else{
                    $Keyword = new Keywords;
                    $Keyword->name = strtolower($keyword_val);
                    $Keyword->created_at = date('Y-m-d H:i:s');
                    $Keyword->updated_at = date('Y-m-d H:i:s');
                    if($Keyword->save()){
                       $keyword_arr[]=array(
                                    'keyword_id'=>$Keyword->id,
                                    "shop_id"=>$Shop->id,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                );  
                    }
                }
            }
            $keyword_shoptype_res = Shop_categories_mapping::insert($keyword_arr);
            
        }
        
        
        $request->session()->flash('alert-success', 'Shop update successfully!');
        return redirect()->back();
    }
    else{
        $request->session()->flash('alert-danger', 'Unable to update Shop!');
        return redirect()->back();
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
    
    function __make_slug($phrase){
        $find = array(":", ",", "'", "-",'.','/');
        $replace   = '';

        $newphrase = str_replace($find, $replace, $phrase);
        $newphrase = strtolower(str_replace(' ', '-', $newphrase));
        return $newphrase;
    }
}
