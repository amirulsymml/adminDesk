<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name', 'slug'];

        public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
