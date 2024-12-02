<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vews extends Model
{
    use HasFactory;
    protected $fillable = ['name','cnic','contact','date'];
}
