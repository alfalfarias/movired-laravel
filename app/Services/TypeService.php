<?php

namespace App\Services;

use App\Models\Type;
use Illuminate\Support\Facades\Http;

class TypeService
{
	public static function get()
	{
		$url = env('API_URL');
		$token = env('API_KEY');

		$response = Http::withHeaders([
			'Authorization' => $token,
			'Content-Type' => 'application/json',
			'merchantId' => '095115',
			'posId' => '10001',
		])
		->get($url.'/ws_MOV_TRANSACCIONS/serviceTypes/');

		$types = collect();
		$types_data = $response['data'];
		foreach ($types_data as $type_data) {
			$type = new Type([
				'code' => $type_data['code'],
				'name' => $type_data['name'],
			]);
			$types->push($type); 
		}
		return $types;
	}
}