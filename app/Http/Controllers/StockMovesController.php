<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Customer;
use App\Models\StockMoves;
use App\Models\StockMovesReturn;
use App\Models\StockTransfer;
use \App\Models\UserRole;
use Auth;
use Illuminate\Support\Carbon;
class StockMovesController extends Controller
{
    public function index(){

        if(Auth::user()){
            $role_id = Auth::user()->role_id;
            $user_role = UserRole::where('role_id', $role_id)->first();
            $permissions = json_decode($user_role->permissions, true);
        }else{
            $permissions = null;
        }

        $stockmoves = StockMoves::get();
        $transferred_qty = StockTransfer::whereDate('created_at', '=', Carbon::today()->toDateString())->count();
        $returned_qty = StockMovesReturn::whereDate('created_at', '=', Carbon::today()->toDateString())->count();
        return view('modules.stock.stockmoves', [
            'transferred_qty' => $transferred_qty,
            'returned_qty' => $returned_qty,
            'stockmoves' => $stockmoves,
            'permissions' => $permissions
        ]);
    }
}
