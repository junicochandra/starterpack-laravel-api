<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class SendEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function send(Request $request){
        try {
            $data = $request->json()->all();

            dispatch(new SendEmailJob($data));
            return response()->json(['message' => 'Send email success!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error while processing the request', 'error' => $e->getMessage()], 500);
        }
    }
}
