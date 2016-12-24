<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_categories_mapping extends Model
{
    protected $table = 'shop_categories_mapping';
    protected $guarded = ['id'];
    protected $fillable = array('*');
}
