<?php
namespace App\Repository\Offers;

use App\Enums\Status;
use App\Models\offer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\Offers\OffersRepositoryInterface;

class OffersRepository implements OffersRepositoryInterface

{
    public function index()
    {
        $offer = offer::orderBy('created_at', 'DESC')->where('status', Status::ACTIVE)->first();
        if (!$offer) {
            return response([
                "status" => false,
                "data" => null,
                "message" => "No activated offer found",
            ], 404);
        }
        return response([
            "status" => true,
            "data" => $offer,
            "message" => "Get latest Offers successfully",
        ], 200);
    }

    public function allOffers()
    {
        $offer = offer::orderBy('created_at', 'DESC')->get();
        if ($offer->isEmpty()) {
            return response([
                "status" => false,
                "data" => null,
                "message" => "No Offers found",
            ], 404);
        }
        return response([
            "status" => true,
            "data" => $offer,
            "message" => "Get latest Offers successfully",
        ], 200);
    }

    public function show($id)
    {
        $offer = offer::find($id);
        if (!$offer) {
            return response([
                "status" => false,
                "data" => null,
                "message" => "No Offer found",
            ], 404);
        }
        return response([
            "status" => true,
            "data" => $offer,
            "message" => "Get One Offer successfully",
        ], 200);
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            // جلب اسم الصورة الاصلي لحفظه فى الداتا بيز
            $image_original_name = $request->file('image')->getClientOriginalName();

            $offer = new offer();
            //Adding the number is automatic
            $offer->number = 'MUR|' . Str::random(10);
            $offer->name = $request->name;
            $offer->image = $image_original_name;
            $offer->new_price = $request->new_price;
            $offer->old_price = $request->old_price;
            $offer->status = $request->status;
            $offer->description = $request->description;

            //After the saving process, the ID is added to the number
            if ($offer->save()) {
                $offer->number .= '|' . $offer->id;
                $offer->save();

            }

            $offer_id = $offer->id;

            // حفظ الصورة الجديده بنفس المعرف
            $image_location = $request->file('image')->storeAs('Offers/'. $offer->id , $image_original_name, 'images');

            DB::commit();

            return response([
                "status" => true,
                "data" => $offer,
                "message" => "Create offer Successfully",
            ], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function update($request , $id)
    {
        DB::beginTransaction();
        try {
            $offer = offer::find($id);
            if (!$offer) {
                return response()->json(['error' => 'offer not found'], 404);
            }

            if ($request->hasFile('image')) {
                // حذف الملف القديم  الخاص بالصورة بالكامل
                if ($offer->image) {
                    $old_image_directory = 'Offers/' . $offer->id;
                    Storage::disk('images')->deleteDirectory($old_image_directory);
                }

                // حفظ الملف الجديد بنفس المعرف
                $image_original_name = $request->file('image')->getClientOriginalName();
                $image_location = $request->file('image')->storeAs('Offers/' . $offer->id, $image_original_name, 'images');

                // تعيين المسار للصورة الجديدة للمنتج
                $offer->image = $image_original_name;
            }

            // تحديث بقية بيانات المنتج
            $offer->name = $request->name;
            $offer->new_price = $request->new_price;
            $offer->old_price = $request->old_price;
            $offer->status = $request->status;
            $offer->description = $request->description;
            $offer->save();


            DB::commit();

            return response([
                "status" => true,
                "data" => $offer,
                "message" => "Offer updated successfully",
            ], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function delete($id)
    {
        $offer = offer::find($id);

        if (!$offer) {
            return response([
                "status" => false,
                "message" => "Product not found",
            ], 404);
        }

        // حذف الصوره المرتبط بالمنتج
        $old_image_directory = 'Offers/' . $offer->id;
        Storage::disk('images')->deleteDirectory($old_image_directory);

        // حذف المنتج
        $offer->delete();

        return response([
            "status" => true,
            "message" => "Deleted successfully",
        ], 200);
    }
}
