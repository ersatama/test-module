<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Invoice\InvoiceRepositoryEloquent;

class ApiController extends Controller
{
    protected $invoice;

    public function __construct(InvoiceRepositoryEloquent $invoice)
    {
        $this->invoice = $invoice;
    }

    public function updateStatus(Request $request) {
        $invoice = 0;
        if ($request->query('invoice')) {
            $invoice = $request->query('invoice');
        } else {
            return response()->json(['errors' => ['message' => ['Invoice number required']]], 422);
        }
        $status = '';
        if ($request->query('status')) {
            $status = $request->query('status');
        } else {
            return response()->json(['errors' => ['message' => ['Status required']]], 422);
        }

        $invoice = $this->invoice->updateStatus($invoice, $status);
        return response()->json(['success' => ['message' => [$invoice]]], 200);
    }
}
