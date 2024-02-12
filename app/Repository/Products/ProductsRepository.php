<?php
namespace App\Repository\Products;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            if ($request->hasFile('image')) {
                // حفظ الصورة الجديدة والحصول على مسارها
                $image_location = $request->file('image')->store('Products', 'images');

                // حذف الصورة القديمة إذا كانت موجودة
                if ($product->image) {
                    Storage::disk('images')->delete($product->image);
                }

                // تعيين الصورة الجديدة للمنتج
                $product->image = $image_location;
            }

            // تحديث بقية بيانات المنتج
            $product->name = $request->name;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->description = $request->description;
            $product->save();

            DB::commit();

            return response([
                "status" => true,
                "data" => $product,
                "message" => "Product updated successfully",
            ], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    public function delete($id)
    {
        //
    }

}
