<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];

    public function employer()
    {
        return $this->hasOne(Employer::class, 'id','company_id');
    }
}
