<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    public function village()
    {
        return $this->hasMany(Village::class);
    }

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class);
    }
}
