<?php

namespace App\Http\Controllers;

use App\offer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOfferPost;
Use Response;
Use Exception;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOffer(StoreOfferPost $request)
    {
        //
     
        $offer = new offer();
        $offer->user_id = $request->user_id;
        $offer->deal_id = $request->deal_id;
        $offer->offer_amount = $request->offer_amount;
        $offer->status = $request->status;
       
        $offer->save();
    
        return response()->json([
            "message" => "offer successfully  created"
        ], 201);
      
      
    
         
    }

    

    public function getOffer($id) {
        // logic to get a offer record goes here
        if (Offer::where('id', $id)->exists()) {
            $offer = Offer::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($offer, 200);
          } else {
            return response()->json([
              "message" => "Offer not found"
            ], 404);
          }
      }
    public function showAllOffers()
    {
        //
              // logic to get all offers goes here
              $offers = offer::get()->toJson(JSON_PRETTY_PRINT);
              return response($offers, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function updateOffer(Request $request, $id) {
        // logic to update a offer record goes 
  
        if (Offer::where('id', $id)->exists()) {
            $offer = Offer::find($id);
            $offer->offer_amount  = is_null($request->offer_amount ) ? $offer->offer_amount : $request->offer_amount ;
            $offer->status  = is_null($request->status ) ? $offer->status : $request->status;
            
           
          
            $offer->save();
    
            return response()->json([
                "message" => "Offer  updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "offer not found"
            ], 404);
            
        }
      }
  
      public function deleteOffer ($id) {
        // logic to delete offer record goes here
        if(Offer::where('id', $id)->exists()) {
            $offer = Offer::find($id);
            $offer->delete();
    
            return response()->json([
              "message" => "record deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "offer not found"
            ], 404);
          }
      }
    
      
      public function getUserOffers($user_id) {
        // logic to get a user offers  goes here
        
            $offers = Offer::where('user_id', $user_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($offers, 200);
      }
      public function getDealOffers($deal_id) {
        // logic to get offers on a deal  goes here
        
            $offers = Offer::where('deal_id', $deal_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($offers, 200);
          
      }
    public function confirmOffer(Request $request, $id) {
        // logic to confirm offer  
  
        if (Offer::where('id', $id)->exists()) {
            $offer = Offer::find($id);
            $offer->status = is_null($request->status) ? $offer->status: $request->status;
            
          
            $offer->save();
    
            return response()->json([
                "message" => "Offer confirmed successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Offer not found"
            ], 404);
            
        }
      }
      public function rejectOffer(Request $request, $id) {
        // logic to confirm offer  
  
        if (Offer::where('id', $id)->exists()) {
            $offer = Offer::find($id);
            $offer->status = is_null($request->status) ? $offer->status: $request->status;
            
          
            $offer->save();
    
            return response()->json([
                "message" => "Offer rejected successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Offer not found"
            ], 404);
            
        }
      }
  
}
