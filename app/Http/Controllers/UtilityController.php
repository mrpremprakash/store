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

class UtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$str = "New York, NY 50805-2578";
        $str = "Banglow No 3, Opposite Mother Dairy, Pandav Nagar, Pandav Nagar, New Delhi, Delhi 110092, India";
        preg_match("/([^,]+),\s*(\w{2})\s*(\d{5}(?:-\d{4})?)/", $str, $matches);

        list($arr['addr'], $arr['city'], $arr['state'], $arr['zip']) = $matches;
        print_r($arr);
    }
    
    public function harvest_store(){
        $shop = Shop::count();
        //$Cities = Cities::select('city_id', 'city_name')->get();
        return view('utility.harvest_store',  compact('shop'));
    }
    
    public function post_harvest_store(Request $request){
        
        $messages = [
            'store_name.required' => 'Keyword is required',
        ];
        $validator = Validator::make($request->all(), [
            'store_name' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect('/harvest_store')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $i=0;
            $url = config('app.address_url').'?query='.urlencode($request->store_name).'&key='.config('app.map_key');
            //$url = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=medical+stores+in+pandav+nagar&key=AIzaSyAgZhTrDcd-NuqVBfH9lu2MEOx1urDCHcg";
            $result = $this->__make_curl_request($url);
            if($result['status']==1){
                $dataArr = json_decode($result['data']);
                if(isset($dataArr->results) && count($dataArr->results)>0){
                    //echo "<pre>";print_r($dataArr->results);exit();
                    foreach ($dataArr->results as $val) {
                        $result_address = $this->__address_lokup($val->formatted_address);
                        $name = trim(strtolower($val->name));
                        $check_shop = Shop::where('name',$name)->count();
                        if($check_shop==0){
                            $name_string = $name . " " . strtolower(trim($result_address['address1'])). " " . strtolower(trim($result_address['address2'])). " " . strtolower(trim($result_address['city'])). " " . strtolower(trim($result_address['zipcode']));
                            //$name_string = str_replace(' ', '-', $name_string);

                            $name_string = $this->__make_slug($name_string);

                            $check_slug = Shop::where('slug', '=', $name_string)->count();
                            $max_slug_id = Shop::max('id');
                            if ($check_slug != 0) {
                                $name_string = $name_string . "_" . $max_slug_id;
                            }
                            $ratingArr = array(1, 2, 3, 4, 5);
                            $rating = array_rand($ratingArr);
                            if(isset($val->rating)){
                                $rating = round($val->rating);
                            }
                            $Shop = new Shop;

                            $Shop->name = $name;
                            $Shop->slug = $name_string;
                            $Shop->city_id = $result_address['city_id'];
                            $Shop->address = $result_address['address'];
                            $Shop->address1 = $result_address['address1'];
                            $Shop->address2 = $result_address['address2'];
                            $Shop->zip_code = $result_address['zipcode'];
                            //$Shop->primary_phone_no = $request->primary_phone_no;
                            //$Shop->alternate_phone_no = $request->alternate_phone_no;
                            $Shop->latitude = $val->geometry->location->lat;
                            $Shop->longitude = $val->geometry->location->lng;
                            //$Shop->email_id = $request->email_id;
                            //$Shop->modes_of_payment = $request->modes_of_payment;
                            //$Shop->open_hours = $request->open_hours;
                            $Shop->rating = $rating;
                            $Shop->status = 0;
                            $Shop->is_verified = 0;
                            $Shop->search_keyword = $request->store_name;
                            $Shop->created_at = date('Y-m-d H:i:s');
                            $Shop->updated_at = date('Y-m-d H:i:s');
                            if($Shop->save()){
                                $i++;
                                if(isset($val->types)){
                                    foreach ($val->types as $keyword){
                                        $Shop_keywords = new Shop_keywords;

                                        $Shop_keywords->name = $keyword;
                                        $Shop_keywords->shop_id = $Shop->id;
                                        $Shop_keywords->created_at = date('Y-m-d H:i:s');
                                        $Shop_keywords->updated_at = date('Y-m-d H:i:s');
                                        $Shop_keywords->save();
                                    }
                                }
                            }
                        }
                    }
                    $request->session()->flash('alert-success', "$i shop created!");
                    return redirect()->back();
                    
                }
                
            }
            
        }
    }
    
    public function __make_curl_request($url){    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POSTFIELDS , null );
        curl_setopt($ch, CURLOPT_POST , 0);
        curl_setopt($ch, CURLOPT_HTTPGET , TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER , TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT , 4);
        curl_setopt($ch, CURLOPT_USERAGENT , "" );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_URL , $url );
        $rgxrData = curl_exec($ch);  // rgxrData stands for response get xml raw Data
        
        if (curl_errno($ch)) {
                $error_message = curl_error($ch);
                $error_no = curl_errno($ch);
                //echo "error_message: " . $error_message . "<br>";
                //echo "error_no: " . $error_no . "<br>";
                curl_close($ch);
                return array('status'=>0,'data'=>$error_message);
        }
        else{
            curl_close($ch);
            return array('status'=>1,'data'=>$rgxrData);
        }
        //curl_close($ch);
        //echo $rgxrData;
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
        return view('utility.add',  compact('Cities','shop','keywords'));
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
            return redirect('store_utility/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $name_string = strtolower(trim($request->store_name))." ".strtolower(trim($request->city_name));
        //$name_string = str_replace(' ', '-', $name_string);
        
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
        //$Shop->primary_phone_no = $request->primary_phone_no;
        //$Shop->alternate_phone_no = $request->alternate_phone_no;
        $Shop->latitude = $latlong[0];
        $Shop->longitude = $latlong[1];
        //$Shop->email_id = $request->email_id;
        //$Shop->modes_of_payment = $request->modes_of_payment;
        //$Shop->open_hours = $request->open_hours;
        $Shop->rating = $rating;
        $Shop->status = 0;
        $Shop->is_verified = 0;
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
        return redirect()->route("store_utility.create");
    }
    else{
        $request->session()->flash('alert-danger', 'Unable to add Shop!');
        return redirect()->route("store_utility.create");
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
    {}

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
    
    function __address_lokup($string){
        //$string = "Banglow No 3, Opposite Mother Dairy, Pandav Nagar, Pandav Nagar, New Delhi, Delhi 110092, India";
        
        $return_address_arr['zipcode']='';
        $return_address_arr['city']=  '';
        $return_address_arr['address']=  $string;
        $return_address_arr['address1']=  '';
        $return_address_arr['address2']=  '';
        $return_address_arr['city_id']= '';
        
        $string = str_replace(', India', '',$string);
        
        $stringArr = explode(',',$string);
        
        
        if($stringArr){
            $stringArr = array_unique($stringArr);
            $stringArr = array_values($stringArr);
            $zipcode = $stringArr[count($stringArr)-1];
            $zipcode_find = preg_match("/(\d{4,6})/", $zipcode, $matches);
            if($matches){
                $return_address_arr['zipcode']=$matches[0];
                $return_address_arr['city']=  str_replace($matches[0], '', $zipcode);
            }
            unset($stringArr[count($stringArr)-1]);
            $len = count($stringArr);

            $firsthalf = array_slice($stringArr, 0, $len / 2);
            $secondhalf = array_slice($stringArr, $len / 2);
            
            $return_address_arr['address1']= implode(',',$firsthalf);
            $return_address_arr['address2']=  implode(',',$secondhalf);
            
        }
        if($return_address_arr['city']){
            $city_data = Cities::where('city_name',  trim(strtolower($return_address_arr['city'])))->first();
            if($city_data){
                $return_address_arr['city_id']= $city_data->city_id;
            }
        }
        
        /*echo $string;
        echo "<pre>";
        print_r($stringArr);
        print_r($return_address_arr);
        exit();*/
        return $return_address_arr;
    }
}
