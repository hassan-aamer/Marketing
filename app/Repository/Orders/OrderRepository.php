<?php
namespace App\Repository\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Orders\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function index()
    {
        //
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $Order = new Order();
            $Order->product_id = $request->product_id;
            $Order->offer_id = $request->offer_id;
            $Order->email = $request->email;
            $Order->phone = $request->phone;
            $Order->price = $request->price;
            $Order->payment_id = $request->payment_id;
            $Order->location = $request->location;
            $Order->save();

            DB::commit();

            return response([
                "status" => true,
                "data" => $Order,
                "message" => "Create Order Successfully",
            ], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function show($id)
    {
        //
    }
    public function delete($id)
    {
        //
    }
}
