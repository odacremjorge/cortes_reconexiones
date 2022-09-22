<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
            'amount_job',
            'date_job',
            'c',
            'cnp',
            'cc',
            'md',
            'mbll',
            'imp',
            'ie',
            'operator_id',
            'remesa_id',
        
       
     ];
}
