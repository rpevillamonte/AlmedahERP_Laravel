<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WarrantyClaims;
use App\Models\Customer;
use App\Models\SalesOrder;
use App\Models\serial_numbers;
use App\Models\warranty;


class repairController extends Controller
{
    //

    function index(){
        $warranty_claims = WarrantyClaims::get();

        return view('modules.manufacturing.repair',['warranty_claims'=>$warranty_claims]);
    }

    function createIndex(){
        $customers = Customer::get();

        return view('modules.manufacturing.newrepairrequest', ['customers'=>$customers]);
    }

    function getSerials($customer_id){
        $sales_order = SalesOrder::where('customer_id', $customer_id)->orderBy('id', 'desc')->get();
        $sn = [];

        foreach ($sales_order as $sales) {
            $isn = serial_numbers::where('sales_id', $sales->id)->get();
            array_push($sn, $isn);
        }

        return response($sn);
    }

    function getWarranty($warranty_id){
        $wr = warranty::where('warranty_id', $warranty_id)->first();
        return response($wr);
    }
}
