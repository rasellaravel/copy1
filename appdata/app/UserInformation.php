<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
	protected $table = 'user_information';
    
    protected $fillable = [
        'user_id',
    ];
	public function users()
    {
        return $this->hasOne(User::class);
    }
}
