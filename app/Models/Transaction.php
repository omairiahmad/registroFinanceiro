<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','type','description','id','created_at','updated_at','amount'];
    protected $guarded = []; // Make all attributes mass assignable

    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }

}
