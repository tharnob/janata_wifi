<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table='stocks';
    protected $fillable=['date','trade_code','high','low','open','close','volume'];
}
