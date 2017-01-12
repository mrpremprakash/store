<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_medicine extends Model
{
    protected $table = 'shop_medicines';
    protected $guarded = ['id'];
    protected $fillable = array('medicine_id','shop_id','price','qty','purchase_date','exp_date','updated_at','created_at'); 
}
