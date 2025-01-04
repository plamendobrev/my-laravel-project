<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use CrudTrait;

    protected $fillable = ['name', 'establishment_date'];
    
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
