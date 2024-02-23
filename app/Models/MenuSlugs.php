<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSlugs extends Model
{

    protected $fillable = ['menu_id', 'slug'];
    protected $table = ['menu_slags'];

    use HasFactory;
    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
