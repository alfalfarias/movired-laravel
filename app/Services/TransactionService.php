<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Facades\Http;

class TransactionService
{
	public static function get($data)
	{
		$url = env('API_URL');
		$token = env('API_KEY');

		$response = Http::withHeaders([
			'Authorization' => $token,
			'Content-Type' => 'application/json',
			'merchantId' => '095115',
			'posId' => '10001',
		])
		->post($url.'/ws_MOV_TRANSACCIONS/transactions/', $data);

		$transactions = collect();
		$transactions_data = $response['data'];
		foreach ($transactions_data as $transaction_data) {
			$transaction = new Transaction([
				'service_type' => $transaction_data['serviceType'],
				'service_subtype' => $transaction_data['serviceSubType'],
				'name' => $transaction_data['name'],
				'name_detail' => $transaction_data['nameDetail'],
				'reference_number' => $transaction_data['referenceNumber'],
				'transfer_id' => $transaction_data['transferId'],
				'source' => $transaction_data['source'],
				'transaction_date' => $transaction_data['transactionDate'],
				'transfer_value' => $transaction_data['transferValue'],
				'commission' => $transaction_data['commission'],
				'transfer_status' => $transaction_data['transferStatus'],
				'gestor_id' => $transaction_data['gestorId'],
				'manager' => $transaction_data['manager'],
				'from' => $transaction_data['from'],
				'product_code' => $transaction_data['productCode'],
				'authorization_number' => $transaction_data['authorizationNumber'],
				'remarks' => $transaction_data['remarks'],
				'txnt_type' => $transaction_data['txntType'],
			]);
			$transactions->push($transaction); 
		}
		return $transactions;
	}
}
