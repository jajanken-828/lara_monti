<?php

namespace App\Http\Controllers\AO_KNITTING\document_management_system;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Document Management System Methods
    public function index()
    {
        return view('AO_KNITTING.document_management_system.employee_docs');
    }

    public function versioning()
    {
        return view('AO_KNITTING.document_management_system.file_versioning_and_access_control');
    }

    public function contracts()
    {
        return view('AO_KNITTING.document_management_system.customer_contracts');
    }

    public function accounting()
    {
        return view('AO_KNITTING.document_management_system.financial_and_accounting');
    }

    public function agreements()
    {
        return view('AO_KNITTING.document_management_system.supplier_contracts_and_agreements');
    }
}
