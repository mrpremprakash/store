<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use App\Shop;
use App\Shop_keywords;
use App\Cities;
use App\Keywords;
use App\Shop_categories_mapping;
use App\Shop_keywords_mapping;
use Illuminate\Support\Facades\Input;
class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = Input::get('keyword');
        $query = "MATCH (address) AGAINST ('$keyword' IN BOOLEAN MODE)";
        // $query looks like 
        // MATCH (first_name, last_name, email) AGAINST ('+jar* +eitni*' IN BOOLEAN MODE)

        $shop = Shop::LeftJoin('cities', 'cities.city_id', '=', 'shop.city_id')
                ->select('shop.*','cities.city_name','cities.city_state AS state_name')
                ->whereRaw($query)->get();
        //echo $shop;exit();
        $res_count= $shop->count();
        $result = $shop->toArray();
        return response()->json([
                                'status' => 'success',
                                'count' =>$res_count,
                                'result' => $result
        ]);
    }
    
    public function get_store_by_slug($slug){
        $check_shop = Shop::where('slug',$slug)->count();
        $shop = Shop::LeftJoin('cities', 'cities.city_id', '=', 'shop.city_id')
                    ->LeftJoin('shop_keywords_mapping', 'shop_keywords_mapping.shop_id', '=', 'shop.id')
                    ->LeftJoin('keywords', 'keywords.id', '=', 'shop_keywords_mapping.keyword_id')
                    ->LeftJoin('shop_categories_mapping', 'shop_categories_mapping.shop_id', '=', 'shop.id')
                    ->LeftJoin('keywords AS cat_keyword', 'cat_keyword.id', '=', 'shop_categories_mapping.keyword_id')
                        ->select('shop.*','cities.city_name','cities.city_state AS state_name'
                                ,DB::raw("(GROUP_CONCAT(DISTINCT(cat_keyword.name) SEPARATOR ',')) as `categories`")
                                ,DB::raw("(GROUP_CONCAT(DISTINCT(keywords.name) SEPARATOR ',')) as `keywords`")
                                )
                        ->where('shop.slug',$slug)
                        ->first();
                
                $result = $shop->toArray();
                if($check_shop==0){
                    return response()->json([
                                        'status' => '0',
                                        'result' => []
                ]);
                }else{
                   $result[0]['images']=array(
                                            asset('/public/uploads/store/O4SO2Q0.jpg'),
                                            asset('/public/uploads/store/O4YIN80.jpg'),
                                            asset('/public/uploads/store/OAV9FP0.jpg')
                                        );
                /*echo "<pre>";
                print_r($result);
                exit();*/
                   return response()->json([
                                        'status' => '1',
                                        'result' => $result
                ]); 
                }
                
    }
    
    public function post_store(Request $request) {
        /*echo "<pre>";
        echo($request->status);
        print_r($request->results[0]);
        echo round($request->results[0]['rating']);
        exit();*/
        $i=0;
        if (isset($request->status) && $request->status == 'OK' && isset($request->results) && count($request->results) > 0) {
            foreach ($request->results as $val) {
                $name_string = strtolower(trim($val['name'])) . " " . strtolower(trim($request->city_name));
                //$name_string = str_replace(' ', '-', $name_string);

                $name_string = $this->__make_slug($name_string);

                $check_slug = Shop::where('slug', '=', $name_string)->count();
                $max_slug_id = Shop::max('id');
                if ($check_slug != 0) {
                    $name_string = $name_string . "_" . $max_slug_id;
                }
                
                $ratingArr = array(1, 2, 3, 4, 5);
                $rating = array_rand($ratingArr);
                if(isset($val['rating'])){
                    $rating = round($val['rating']);
                }
    
                $Shop = new Shop;

                $Shop->name = $val['name'];
                $Shop->slug = $name_string;
                $Shop->city_id = $request->city_id;
                $Shop->address = $val['formatted_address'];
                //$Shop->zip_code = $request->store_zip;
                //$Shop->primary_phone_no = $request->primary_phone_no;
                //$Shop->alternate_phone_no = $request->alternate_phone_no;
                $Shop->latitude = $val['geometry']['location']['lat'];
                $Shop->longitude = $val['geometry']['location']['lng'];
                //$Shop->email_id = $request->email_id;
                //$Shop->modes_of_payment = $request->modes_of_payment;
                //$Shop->open_hours = $request->open_hours;
                $Shop->rating = $rating;
                $Shop->status = 0;
                $Shop->is_verified = 0;
                $Shop->created_at = date('Y-m-d H:i:s');
                $Shop->updated_at = date('Y-m-d H:i:s');
                if($Shop->save()){
                    $i++;
                    if(isset($val['types'])){
                        foreach ($val['types'] as $keyword){
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
            echo $i.' record inserted';
        }
    }

    public function update_database(){
        $keyword = Input::get('keyword');
        if($keyword=='slug'){
            $result = $this->__update_slug();
            echo $result;
        }
        else{
            $result = $this->__make_sitemap();
            echo $result;
        }
        
    }
    
    function __make_sitemap(){
        $dir = '../sitemap.xml';
        /*$doc = new \DOMDocument('1.0', 'UTF-8');
        $ele = $doc->createElement( 'urlset' );
        $ele->nodeValue = 'Hello XML World';
        $doc->appendChild( $ele );
        $doc->save($dir);*/
        $shop = Shop::get();
        $myfile  = fopen($dir, "w");
        $txt = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        $txt.= '<urlset xmlns="http://www.google.com/schemas/sitemap/0.90">'.PHP_EOL;
        if($shop){
            foreach($shop as $val){
                $URL = "http://medicinefinder.in/drug-store/".$val->slug;
                $updated = $val->updated_at;
                
                $txt.= '<url>'.PHP_EOL;
                $txt.= '<loc>'.$URL.'</loc>'.PHP_EOL;
                $txt.= '<lastmod>'.$updated.'</lastmod>'.PHP_EOL;
                $txt.= '<changefreq>daily</changefreq>'.PHP_EOL;
                $txt.= '<priority>0.5</priority>'.PHP_EOL;
                $txt.= '</url>'.PHP_EOL;
            }
        }
       
        fwrite($myfile, $txt);
        $txt = "</urlset>".PHP_EOL;
        fwrite($myfile, $txt);
        fclose($myfile);
    }
    function __update_slug(){
        $shop = Shop::join('cities', 'cities.city_id', '=', 'shop.city_id')->select('shop.*','cities.city_name')->get();
        $i=0;
        if($shop->count()>0){
            foreach ($shop as $shop_val){
                
                $name_string = trim($shop_val->name)
                        ." ".trim($shop_val->address1)
                        ." ".trim($shop_val->address2)
                        ." ".trim($shop_val->city_name)
                        ." ".trim($shop_val->zip_code);
                $name_string = $this->__make_slug($name_string);
                
                $check_slug = Shop::where('slug','=',$name_string)->where('id','!=',$shop_val->id)->count();
                if($check_slug>0){
                    $name_string = $name_string.'-'.$shop_val->id;
                }
                
                $shop = Shop::find($shop_val->id);
                $shop->slug = $name_string;
                $shop->updated_at =  date('Y-m-d H:i:s');
                if($shop->save()){
                    $i++;
                }
            }
        }
        return "$i record updated";
    }
    
    function __make_slug($phrase){
        $find = array(":", ",", "'", "-",'.','/');
        $replace   = '';

        $newphrase = str_replace($find, $replace, $phrase);
        $newphrase = strtolower(str_replace(' ', '-', $newphrase));
        return $newphrase;
    }
}
