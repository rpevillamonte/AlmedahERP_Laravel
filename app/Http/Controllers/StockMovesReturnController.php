<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockMovesReturn;
use App\Models\StockTransfer;
use App\Models\StockMoves;
use \App\Models\UserRole;
use Auth;
use \stdClass;
use Illuminate\Support\Carbon;
class StockMovesReturnController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            $role_id = Auth::user()->role_id;
            $user_role = UserRole::where('role_id', $role_id)->first();
            $permissions = json_decode($user_role->permissions, true);
        }else{
            $permissions = null;
        }

        $stock_transfer = StockTransfer::get();
        $stock_moves = StockMoves::get();
        // $stock_moves = StockMoves::where('tracking_id', $stock_transfer->tracking_id)->first();
        return view('modules.stock.stockmovesreturn', ['stock_transfer' => $stock_transfer, 'stock_moves'=> $stock_moves, 'permissions' => $permissions]);
    }

    public function store(Request $request){
        try {

            if(StockMovesReturn::where('tracking_id', request('tracking_id'))->exists()){
                if(empty(json_decode(request('item_code'), true))){
                    return Response::json(['error' => 'Error msg'], 404);
                }

                $stock_return = StockMovesReturn::where('tracking_id', request('tracking_id'))->first();
                $stock_return_item_code = json_decode($stock_return->item_code ?? null, true);
                $stock_transfer_item_code = json_decode(request('stockTransferItemsUpdated'), true);
                $stock_return_logs = json_decode($stock_return->return_logs, true);
                
                StockMovesReturn::where('tracking_id', request('tracking_id'))->delete();
            }else{
                $stock_return_logs = array();
                $obj = new stdClass();
                $obj->message = 'Stock Return created ' .'('.request('tracking_id').')';
                $obj->date = Carbon::now()->format('F d Y h:i:s A');
                array_push($stock_return_logs, $obj);
            }

            $item_code_obj = json_decode(request('item_code'), true);
            $checked_materials = json_decode(request('checkedMaterials'), true);

            foreach ($item_code_obj as $index=>$item) {
                $keys = array_keys($item);
            }

            $changes = array();
            foreach ($checked_materials as $index=>$item) {
                sleep(1);
                $obj = new stdClass();
                $obj->message = "Raw Material (".$item['item_code'].") with a quantity of ".$item['qty_transferred']." has been returned to ".str_replace("_", " ", $item['target_station'])." station";
                $obj->date = Carbon::now()->format('F d Y h:i:s A');
                array_push($changes, $obj);
            }
            foreach($changes as $change){
                array_push($stock_return_logs, $change);
            }

            $stockMoves = StockMoves::where('tracking_id', request('tracking_id'))->first();
            $stockMovesTransfer = StockTransfer::where('tracking_id', request('tracking_id'))->first();
            $stockMovesTransfer->update(['item_code' => request('stockTransferItemsUpdated')]);
            if(count(json_decode($stockMovesTransfer->item_code, true)) == 0){
                sleep(1);
                $obj = new stdClass();
                $obj->message = "Materials in stock return with tracking ID ".request('tracking_id')." was returned successfully";
                $obj->date = Carbon::now()->format('F d Y h:i:s A');
                array_push($stock_return_logs, $obj);
                $stockMoves->update(['stock_moves_type' => 'Return', 'status'=> 'Successfully Returned']);
            }else{
                $stockMoves->update(['stock_moves_type' => 'Return', 'status'=> 'Pending (Return)']);
            }     

            $stockMovesReturn = new StockMovesReturn();
            $stockMovesReturn->tracking_id = request('tracking_id');
            $stockMovesReturn->return_date = request('return_date');
            $stockMovesReturn->item_code = request('item_code');
            $stockMovesReturn->return_status = 'PENDING';
            $stockMovesReturn->return_logs = json_encode($stock_return_logs);
            $stockMovesReturn->save();

            return response(json_encode($stock_return_logs));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function view_items($id) {
        $stock_transfer = StockTransfer::find($id);
        return response($stock_transfer->item_code);
    }
}
