<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	use HasFactory;

	protected $fillable = [
		'service_type',
		'service_subtype',
		'name',
		'name_detail',
		'reference_number',
		'transfer_id',
		'source',
		'transaction_date',
		'transfer_value',
		'commission',
		'transfer_status',
		'gestor_id',
		'manager',
		'from',
		'product_code',
		'authorization_number',
		'remarks',
		'txnt_type',
	];
}
