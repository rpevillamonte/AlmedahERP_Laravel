<?php

namespace App\Http\Controllers;

use App\Models\ManufacturingMaterials;
use App\Models\MaterialPurchased;
use App\Models\MPRecord;
use App\Models\RequestQuotationSuppliers;
use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\SupplierGroup;
use App\Models\SuppliersQuotation;
use \App\Models\UserRole;
use Exception;
use Auth;
use Illuminate\Support\Facades\DB;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $role_id = Auth::user()->role_id;
            $user_role = UserRole::where('role_id', $role_id)->first();
            $permissions = json_decode($user_role->permissions, true);
        }else{
            $permissions = null;
        }
        //
        $suppliers = Supplier::all();
        foreach ($suppliers as $supplier) {
            # code...
            $rms = $supplier->sg_materials;
            $supplier->rm_count = $rms->count();
        }
        $names = Supplier::select('company_name')->get();
        $materials = ManufacturingMaterials::all();
        return view('modules.buying.supplier', ['suppliers' => $suppliers, 'names' => $names, 'materials' => $materials, 'permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modules.buying.createnewsupplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $data = new Supplier();

            $form_data = $request->input();

            $lastSupplier = Supplier::orderby('created_at', 'desc')->first();
            $nextId = ($lastSupplier)
                ? Supplier::orderby('created_at', 'desc')->first()->id + 1 :
                1;

            $data->supplier_id = "SUP" . $nextId;

            $data->company_name = $form_data['supplier_name'];
            $data->supplier_group = $form_data['supplier_group'];
            if (isset($form_data['supplier_contact'])) {
                $data->contact_name = $form_data['supplier_contact'];
            }
            $data->phone_number = $form_data['supplier_phone'];
            $data->supplier_email = $form_data['supplier_email'];
            $data->supplier_address = $form_data['supplier_address'];

            $data->save();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getSupplier($supplier_id)
    {
        return ['supplier' => Supplier::where('supplier_id', $supplier_id)->first()];
    }

    public function getSupplierData()
    {
        $suppliers = Supplier::all();
        foreach ($suppliers as $supplier) {
            # code...
            $rms = $supplier->sg_materials;
            $supplier->rm_count = $rms->count();
        }
        return response()->json(['suppliers' => $suppliers]);
    }

    public function filterByName($name)
    {
        $suppliers = Supplier::where('company_name', 'LIKE', "%" . $name . "%")->get();
        foreach ($suppliers as $supplier) {
            # code...
            $rms = $supplier->sg_materials;
            $supplier->rm_count = $rms->count();
        }
        return response()->json(['suppliers' => $suppliers]);
    }

    public function filterBySupplierGroup($item_code)
    {
        $suppliers = DB::table('suppliers')
            ->join('supplier_group', 'supplier_group.supplier_id', '=', 'suppliers.supplier_id')
            ->where('supplier_group.item_code', '=', $item_code)
            ->get();
        foreach ($suppliers as $supplier) {
            # code...
            $rms = Supplier::find($supplier->id)->first()->sg_materials;
            $supplier->rm_count = $rms->count();
        }
        return response()->json(['suppliers' => $suppliers]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //DB::connection()->enableQueryLog();
        $supplier = Supplier::find($id);
        $counts = array();
        $counts['sq_count'] = SuppliersQuotation::where('supplier_id', $supplier->supplier_id)->get()->count();
        $counts['rq_count'] = RequestQuotationSuppliers::where('supplier_id', $supplier->supplier_id)->get()->count();
        $mp = MaterialPurchased::where('items_list_purchased', 'LIKE', "%" . $supplier->supplier_id . "%")
            ->where('mp_status', '=', 'To Receive and Bill')->get();
        $counts['po_count'] = $mp->count();
        $pr_count = 0;
        $pi_count = 0;
        foreach ($mp as $record) {
            $pr = $record->receipt;
            if ($pr !== null) {
                $pr_count++;
                if ($pr->invoice !== null) $pi_count++;
            }
        }
        $counts['pr_count'] = $pr_count;
        $counts['pi_count'] = $pi_count;

        $supplier_mats = $supplier->sg_materials;
        foreach ($supplier_mats as $rm) {
            # code...
            $rm_rate = MPRecord::where('item_code', $rm->item_code)->where('supplier_id', $rm->supplier_id)->first();
            if (is_null($rm_rate)) {
                $rm->rate = 0;
            } else $rm->rate = $rm_rate->rate;
            $rm->item = ManufacturingMaterials::where('item_code', $rm->item_code)->first();
        } 

        //echo dd(DB::getQueryLog());

        return view('modules.buying.supplierInfo', ['supplier' => $supplier, 'counts' => $counts, 'material_data' => $supplier_mats]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $data = Supplier::find($id);

            $form_data = $request->input();

            $data->company_name = $form_data['supplier_name'];
            $data->supplier_group = $form_data['supplier_group'];
            if (isset($form_data['supplier_contact'])) {
                $data->contact_name = $form_data['supplier_contact'];
            }
            $data->contact_name = $form_data['supplier_contact'];
            $data->phone_number = $form_data['supplier_phone'];
            $data->supplier_email = $form_data['supplier_email'];
            $data->supplier_address = $form_data['supplier_address'];

            $data->save();
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $supplier = Supplier::find($id);
        $supplier->delete();
    }
}
