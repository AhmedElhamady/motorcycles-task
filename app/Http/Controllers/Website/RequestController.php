<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnquiryRequest;
use App\Models\Enquiry;

class RequestController extends Controller
{
    public function store(StoreEnquiryRequest $request)
    {
        try {
            Enquiry::create([
                'motorcycle_id' => $request->validated('model'),
                'customer_name' => $request->validated('fullName'),
                'email'         => $request->validated('email'),
                'phone'         => $request->validated('phone'),
                'message'       => $request->validated('message'),
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Enquiry submitted successfully.',
            ], 200);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'status'  => false,
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }
}
