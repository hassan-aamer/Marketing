<?php
namespace App\Repository\About;

use Illuminate\Support\Facades\DB;
use App\Interfaces\About\AboutRepositoryInterface;
use App\Models\About;

class AboutRepository implements AboutRepositoryInterface
{
    public function update($request,$id)
    {
        DB::beginTransaction();
        try{
            $about = About::find($id);
            if (!$about) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            $about->title = $request->title;
            $about->description = $request->description;
            $about->save();

            DB::commit();

            return response([
                "status" => true,
                "data" => $about,
                "message" => "About updated successfully",
            ], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
