<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class Upload extends Model
{
    use HasFactory;
    protected $table = 'uploads';
    
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'file',
    ];

}
