<?php
namespace App\Repository\Products;

use App\Enums\Status;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\Products\ProductsRepositoryInterface;

class ProductsRepository implements ProductsRepositoryInterface
{

    // Get All Product By Activated
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->where('status', Status::ACTIVE)->first();
        if (!$product) {
            return response([
                "status" => false,
                "data" => null,
                "message" => "No activated product found",
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
        if ($product->isEmpty()) {
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


    //get One Product
    public function show($id)
    {
        $product = Product::find($id);
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
            "message" => "Get One product successfully",
        ], 200);
    }


    // Create One Product
    public function create($request)
    {
        DB::beginTransaction();
        try {
            // جلب اسم الصورة الاصلي لحفظه فى الداتا بيز
            $image_original_name = $request->file('image')->getClientOriginalName();

            $product = new Product();
            $product->name = $request->name;
            $product->image = $image_original_name;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->description = $request->description;
            $product->save();

            // حفظ الصورة الجديده بنفس المعرف
            $image_location = $request->file('image')->storeAs('Products/'. $product->id , $image_original_name, 'images');

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


    // Update One Product By ID
    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            if ($request->hasFile('image')) {
                // حذف الملف القديم  الخاص بالصورة بالكامل
                if ($product->image) {
                    $old_image_directory = 'Products/' . $product->id;
                    Storage::disk('images')->deleteDirectory($old_image_directory);
                }

                // حفظ الملف الجديد بنفس المعرف
                $image_original_name = $request->file('image')->getClientOriginalName();
                $image_location = $request->file('image')->storeAs('Products/' . $product->id, $image_original_name, 'images');

                // تعيين المسار للصورة الجديدة للمنتج
                $product->image = $image_original_name;
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


    //Delete One Product By ID
    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response([
                "status" => false,
                "message" => "Product not found",
            ], 404);
        }

        // حذف الصوره المرتبط بالمنتج
        $old_image_directory = 'Products/' . $product->id;
        Storage::disk('images')->deleteDirectory($old_image_directory);

        // حذف المنتج
        $product->delete();

        return response([
            "status" => true,
            "message" => "Deleted successfully",
        ], 200);
    }

}
