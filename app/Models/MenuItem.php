<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'app_menu_items';

    protected $guarded = ['id'];

    protected $fillable = [
        'title', 'name', 'slug', 'type', 'target', 'link', 'menu_id', 'status',
    ];

}
