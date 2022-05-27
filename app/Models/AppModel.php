<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PicModel;

class AppModel extends Model
{
    use HasFactory;

    protected $table = 'apps';
    protected $guarded = ['id'];

    public function pics()
    {
        return $this->belongsTo(PicModel::class, 'pic_id');
    }
}
