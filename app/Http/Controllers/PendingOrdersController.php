<?php

namespace App\Http\Controllers;

use App\Models\MaterialsOrdered;
use Illuminate\Http\Request;
use \App\Models\UserRole;
use Auth;

class PendingOrdersController extends Controller
{
    //
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

        $mat_ordered = MaterialsOrdered::all();

        $order_progress = array();

        foreach ($mat_ordered as $mat) {
            $list = $mat->items_list();
            $total_received = 0;
            $total_quantity = 0;
            foreach ($list as $item) {
                $total_received += $item['qty_received'];
                $total_quantity += $item['qty_ordered'];
            }
            $result = ($total_quantity == 0 && $total_received == 0) ? 0 : 
                      intval(($total_received / $total_quantity)*100);
            array_push(
                $order_progress,
                $result
            );
        }

        return view('modules.buying.pendingorders', ['mat_ordered' => $mat_ordered, 'totals' => $order_progress,'permissions' => $permissions]);
    }

    public function view_progress($id)
    {
        $order = MaterialsOrdered::find($id);
        $list = $order->items_list();

        return ['items_list' => $list];
    }

}
