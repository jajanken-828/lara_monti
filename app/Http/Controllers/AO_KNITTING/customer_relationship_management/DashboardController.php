<?php

namespace App\Http\Controllers\AO_KNITTING\customer_relationship_management;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // CRM Methods
    public function index()
    {
        return view('AO_KNITTING.customer_relationship_management.customer_information');
    }

    public function contract()
    {
        return view('AO_KNITTING.customer_relationship_management.contract_and_agreement');
    }

    public function communication()
    {
        return view('AO_KNITTING.customer_relationship_management.communication_tracking');
    }

    public function history()
    {
        return view('AO_KNITTING.customer_relationship_management.customer_history_sales_analytics');
    }

    public function support()
    {
        return view('AO_KNITTING.customer_relationship_management.customer_support');
    }

    public function prospect()
    {
        return view('AO_KNITTING.customer_relationship_management.lead_inquiry_prospect');
    }

    public function quote()
    {
        return view('AO_KNITTING.customer_relationship_management.quotation');
    }

    public function sales()
    {
        return view('AO_KNITTING.customer_relationship_management.sales_order');
    }
}
