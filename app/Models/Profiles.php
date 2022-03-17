<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    protected $fillable=['first_name','middle_name','last_name','user_id'];

    
    public function getFullName()
    {
        return ucwords(
            $this->first_name.' '.
            ($this->middle_name?ucfirst($this->middle_name).'. ':'').
            $this->last_name
        );
    }
}
