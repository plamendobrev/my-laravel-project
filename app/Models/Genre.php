<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use CrudTrait;

    protected $fillable = ['name'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
