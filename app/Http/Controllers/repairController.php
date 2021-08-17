<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WarrantyClaims;
use App\Models\Customer;
use App\Models\SalesOrder;
use App\Models\serial_numbers;
use App\Models\warranty;
use App\Models\Employee;
use App\Models\ManufacturingProducts;
use DB;


class repairController extends Controller
{
    //

    function index(){
        $warranty_claims = WarrantyClaims::get();

        return view('modules.manufacturing.repair',['warranty_claims'=>$warranty_claims]);
    }

    function viewEdit($id){
        $warranty_claims = WarrantyClaims::where('id', $id)->first();
        #Get warranty info
        $sn = DB::table('serial_numbers')
        ->join('warranties', 'warranties.id', '=', 'serial_numbers.warranty_id')
        ->where('serial_numbers.serial_no', '=', $warranty_claims->serial_number)
        ->first();

        $product_name = ManufacturingProducts::where('product_code', $warranty_claims->product_code)->first();

        $employee = Employee::where('employee_id', $warranty_claims->employee_id)->first();

        $salesorder = SalesOrder::where('id', $warranty_claims->sales_id)->first();
        $customer = Customer::where('id', $salesorder->customer_id)->first();

        return view('modules.manufacturing.repairinfo', ['warranty_claims'=>$warranty_claims, 'sn'=>$sn, 'product_name'=>$product_name, 'employee'=>$employee, 'customer'=>$customer]);
    }

    function createIndex(){
        $customers = Customer::get();
        $employees = Employee::get();

        return view('modules.manufacturing.newrepairrequest', ['customers'=>$customers, 'employees'=>$employees]);
    }

    function getSerials(Request $request){
        $customer_id = $request->input('customer_id');
        $sales_order = SalesOrder::where('customer_id', $customer_id)->orderBy('id', 'desc')->get();
        $sn = [];

        foreach ($sales_order as $sales) {
            $isn = serial_numbers::where('sales_id', $sales->id)->get();
            foreach($isn as $ijn){
                array_push($sn, $ijn);
            }
        }
        array_filter($sn);

        return response($sn);
    }

    function getSerialWithWarranty(Request $request){
        $serial_no = $request->input('serial_no');
        $sn = DB::table('serial_numbers')
        ->join('warranties', 'warranties.id', '=', 'serial_numbers.warranty_id')
        ->where('serial_numbers.serial_no', '=', $serial_no)
        ->get();

        return response($sn);
    }

    function getCustomerDetails(Request $request){
        $customer_id = $request->input('customer_id');
        $customer = Customer::where('id', $customer_id)->first();

        return response($customer);
    }

    function getWarranty($warranty_id){
        $wr = warranty::where('warranty_id', $warranty_id)->first();
        return response($wr);
    }

    function store(Request $request){
        //Needs Validation
        $form_data = $request->input();
        
        $warranty_claims = new WarrantyClaims();
        $warranty_claims->save();
        $warranty_claims = WarrantyClaims::find($warranty_claims->id);
        $warranty_claims->wclaim_id = "WCLAIM-" . $warranty_claims->id;
        $warranty_claims->sales_id = $form_data['sales_id'];
        $warranty_claims->employee_id = $form_data['employee_id'];
        $warranty_claims->issue_date = $form_data['issue_date'];
        $warranty_claims->issue_desc = $form_data['issue_desc'];
        $warranty_claims->repair_status = $form_data['repair_status'];
        $warranty_claims->resolution_date = $form_data['resolution_date'];
        $warranty_claims->resolution_details = $form_data['resolution_details'];
        $warranty_claims->customer_name = $form_data['customer_name'];
        $warranty_claims->product_code = $form_data['product_code'];
        $warranty_claims->serial_number = $form_data['serial_number'];
        $warranty_claims->warranty_status = $form_data['warranty_status'];
        $warranty_claims->additional_notes = $form_data['Description'];
        $warranty_claims->save();

        return response($form_data);
    }

    function update(Request $request, $id){
        //Needs Validation
        $form_data = $request->input();

        $warranty_claims = WarrantyClaims::find($id);
        $warranty_claims->wclaim_id = "WCLAIM-" . $warranty_claims->id;
        $warranty_claims->sales_id = $form_data['sales_id'];
        $warranty_claims->issue_date = $form_data['issue_date'];
        $warranty_claims->issue_desc = $form_data['issue_desc'];
        $warranty_claims->repair_status = $form_data['repair_status'];
        $warranty_claims->resolution_date = $form_data['resolution_date'];
        $warranty_claims->resolution_details = $form_data['resolution_details'];
        $warranty_claims->customer_name = $form_data['customer_name'];
        $warranty_claims->product_code = $form_data['product_code'];
        $warranty_claims->serial_number = $form_data['serial_number'];
        $warranty_claims->warranty_status = $form_data['warranty_status'];
        $warranty_claims->additional_notes = $form_data['Description'];
        $warranty_claims->save();

        return response($form_data);
    }
}
