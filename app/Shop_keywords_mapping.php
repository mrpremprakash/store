<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_keywords_mapping extends Model
{
    protected $table = 'shop_keywords_mapping';
    protected $guarded = ['id'];
    protected $fillable = array('*');
}
