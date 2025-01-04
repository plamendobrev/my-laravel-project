<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'release_date', 'manufacturer_id', 'genre_id', 'description'];
    
    use CrudTrait;
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
