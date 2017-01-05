<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_details extends Model
{
    protected $table = 'invoice_details';
    protected $guarded = ['id'];
    protected $fillable = array('*');
}
