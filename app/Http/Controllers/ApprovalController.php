<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        $actcode = $request->input('actcode');

        $doctype = 'PR';
        $branchcode = 'HO';
        $level = 1;

        // Call the stored procedure with the provided parameters
        $data = DB::select('EXEC sproc_vbnet_load_purapp_summ ?, ?, ?, ?', [$doctype, $branchcode, $level, $actcode]);

        // Return the data as a JSON response
        return response()->json($data);
    }

    public function post(Request $request)
    {
        
      
    }
}