<?php
namespace App\Repository\Contact;


use Illuminate\Support\Facades\DB;
use App\Interfaces\Contact\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface

{
        // Update About
        public function update($request,$id)
        {
            DB::beginTransaction();
            try{
                $Contact = Contact::find($id);
                if (!$Contact) {
                    return response()->json(['error' => 'Contact not found'], 404);
                }

                $Contact->phone = $request->phone;
                $Contact->email = $request->email;
                $Contact->url_facebook = $request->url_facebook;
                $Contact->url_instagram = $request->url_instagram;
                $Contact->url_twitter = $request->url_twitter;
                $Contact->url_youtube = $request->url_youtube;
                $Contact->location = $request->location;
                $Contact->save();

                DB::commit();

                return response([
                    "status" => true,
                    "data" => $Contact,
                    "message" => "Contact updated successfully",
                ], 200);

            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        // Show About
        public function show($id)
        {
            $Contact = Contact::find($id);

            return response([
                "status" => true,
                "data" => $Contact,
                "message" => "Show About successfully",
            ], 200);
        }
}
