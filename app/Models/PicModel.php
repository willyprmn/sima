<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicModel extends Model
{
    use HasFactory;

    protected $table = 'pics';
    protected $guarded = ['id'];
}
