<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use softDeletes;
    protected $fillable = ['title', 'sub_title', 'description', 'active'];
}
