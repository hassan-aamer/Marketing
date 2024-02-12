<?php
namespace App\Repository\Products;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Products\ProductsRepositoryInterface;

class ProductsRepository implements ProductsRepositoryInterface
{

    // Get All Product
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->where('status', 1)->first();
        if (!$product) {
            return response([
                "status" => false,
                "data" => null,
                "message" => "No product found",
            ], 404);
        }
        return response([
            "status" => true,
            "data" => $product,
            "message" => "Get latest product successfully",
        ], 200);
    }


    public function show()
    {
        //
    }


    // Create One Product
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $image = $request->file('image')->getClientOriginalName();
            $product = new Product();
            $product->name = $request->name;
            $product->image = $image;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->description = $request->description;
            $product->save();
            // $path = $request->file('image')->store('Products','images');

            DB::commit();

            return response([
                "status" => true,
                "data" => $product,
                "message" => "Create Product Successfully",
            ], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function update()
    {
        //
    }


    public function delete()
    {
        //
    }

}
