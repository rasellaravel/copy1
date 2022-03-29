<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $fillable = [
		'company_name', 'address', 'tel', 'fax', 'email', 'company_code', 'vat_code', 'bank_name', 'bank_code', 'other_code', 'director_name', 'director_tel', 'de_director_name', 'de_director_tel'
	];
	protected $table = 'contact';
}
