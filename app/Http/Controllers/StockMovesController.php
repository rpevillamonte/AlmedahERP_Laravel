<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Customer;
use App\Models\StockMoves;
use App\Models\StockMovesReturn;
use App\Models\StockTransfer;
use Illuminate\Support\Carbon;
class StockMovesController extends Controller
{
    public function index(){
        $stockmoves = StockMoves::get();
        $transferred_qty = StockTransfer::whereDate('created_at', '=', Carbon::today()->toDateString())->count();
        $returned_qty = StockMovesReturn::whereDate('created_at', '=', Carbon::today()->toDateString())->count();
        return view('modules.stock.stockmoves', [
            'transferred_qty' => $transferred_qty,
            'returned_qty' => $returned_qty,
            'stockmoves' => $stockmoves
        ]);
    }
}
