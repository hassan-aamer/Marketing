<?php
namespace App\Repository\Products;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Products\ProductsRepositoryInterface;

class ProductsRepository implements ProductsRepositoryInterface
{

    // Get All Product By Activated
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

    // Get All Product
    public function allProducts()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
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
            $image_location = $request->file('image')->store('Products', 'images');
            $product = new Product();
            $product->name = $request->name;
            $product->image = $image;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->description = $request->description;
            $product->save();

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
    public function update($request)
    {
        //
    }


    public function delete($id)
    {
        //
    }

}
