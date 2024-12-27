<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    function webhook(Request $request)
    {
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->nid = $request->nid;
        $patient->center_id = $request->center_id;
        $patient->save();
        logger('Google Form Webhook', $request->all());
        return response()->json(['message' => 'Webhook received']);
    }

}
