<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppRequest;
use App\Services\TransactionService;
use App\Services\TypeService;
use Carbon\Carbon;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AppRequest $request)
    {
        $types = TypeService::get();
        $data = $request->only([
            'service_type',
            'start_date',
            'end_date',
            'page_number',
            'page_size',
        ]);
        if (!isset($data['service_type'])) {
            $type = $types->first();
            $data['service_type'] = $type->code;
        }
        if (!isset($data['start_date'])) {
            $data['start_date'] = Carbon::now()->format('Y-m-d');
        }
        if (!isset($data['end_date'])) {
            $data['end_date'] = Carbon::now()->format('Y-m-d');
        }
        if (!isset($data['page_number'])) {
            $data['page_number'] = 1;
        }
        if (!isset($data['page_size'])) {
            $data['page_size'] = 10;
        }

        $body = [
            'getTransactionOrigin' => 'CHANNEL',
            'serviceType' => $data['service_type'],
            'startDate' => str_replace('-', '', $data['start_date']),
            'endDate' => str_replace('-', '', $data['end_date']),
            'pageNumber' => $data['page_number'],
            'pageSize' => $data['page_size'],
        ];
        $transactions = TransactionService::get($body);

        $view_data = [
            'types' => $types,
            'transactions' => $transactions,
            'form' => $data,
        ];
        return view('app', $view_data);
    }
}
