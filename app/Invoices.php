<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = 'invoices';
    protected $guarded = ['id'];
    protected $fillable = array('*');
}
