<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;
use Image;
class ApiController extends Controller
{
    //
    
    public function getAllDeals() {
        // logic to get all students goes here
        $deals = Deal::get()->toJson(JSON_PRETTY_PRINT);
        return response($deals, 200);
      }
  
      public function createDeal(Request $request) {
        // logic to create a deal record goes here
        $image= $request->file('image');
        $imagefilename = time(). '.' .$image->getClientOriginalExtension();
        $location = public_path('uploads/' . $imagefilename);
            Image::make($image)->resize(800, 400)->save($location);


        $deal = new Deal();
        $deal->user_id = $request->user_id;
        $deal->companyName = $request->companyName;
        $deal->companyType = $request->companyType;
        $deal->companyIndustry = $request->companyIndustry;
        $deal->Address = $request->Address ;
        $deal->telephone = $request->telephone;
        $deal->email= $request->email;
        $deal->rating= $request->rating;
        $deal->AmountToRaise = $request->AmountToRaise;
        $deal->image = $imagefilename;
        $deal->detailedDescription = $request->detailedDescription;
        $deal->businessPlan= $request->businessPlan;
        $deal->MOU = $request->MOU;
        $deal->certificateOfRegistration= $request->certificateOfRegistration;
        $deal->financialStatement= $request->financialStatement;
        $deal->cashFlowStatement= $request->cashFlowStatement;
        $deal->contractDocument= $request->contractDocument;
        $deal->auditedAccounts = $request->auditedAccounts;
        $deal->save();
    
        return response()->json([
            "message" => "Deal record created"
        ], 201);
      
      }
  
      public function getDeal($id) {
        // logic to get a deal record goes here
        if (Deal::where('id', $id)->exists()) {
            $deal = Deal::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($deal, 200);
          } else {
            return response()->json([
              "message" => "Deal not found"
            ], 404);
          }
      }
      public function getUserDeals($user_id) {
        // logic to get a deal record goes here
        if (Deal::where('user_id', $user_id)->exists()) {
            $deals = Deal::where('user_id', $user_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($deals, 200);
          } else {
            return response()->json([
              "message" => "No Deal(s) found"
            ], 404);
          }
      }
  
      public function updateDeal(Request $request, $id) {
        // logic to update a deal record goes 
  
        if (Deal::where('id', $id)->exists()) {
            $deal = Deal::find($id);
            $deal->user_id = is_null($request->user_id) ? $deal->user_id: $request->user_id;
             $deal->companyName = is_null($request->companyName) ? $deal->companyName: $request->companyName;
            $deal->companyType = is_null($request->companyType) ? $deal->companyType : $request->companyType;
            $deal->companyIndustry = is_null($request->companyIndustry) ? $deal->companyIndustry: $request->companyIndustry;
            $deal->Address = is_null($request->Address) ? $deal->Address : $request->Address;
            $deal->telephone = is_null($request->telephone) ? $deal->telephone: $request->telephone;
            $deal->email = is_null($request->email) ? $deal->email: $request->email;
            $deal->rating = is_null($request->rating) ? $deal->rating: $request->rating;

            $deal->AmountToRaise= is_null($request->AmountToRaise) ? $deal->AmountToRaise: $request->AmountToRaise;
         // $deal->image = is_null($request->image) ? $deal->image : $request->image;
           // $deal->image = $imagefilename;
            $deal->detailedDescription = is_null($request->detailedDescription) ? $deal->detailedDescription: $request->detailedDescription;
            $deal->businessPlan = is_null($request->businessPlan) ? $deal->businessPlan : $request->businessPlan;
            $deal->MOU = is_null($request->MOU) ? $deal->MOU: $request->MOU;
            $deal->certificateOfRegistration = is_null($request->certificateOfRegistration) ? $deal->certificateOfRegistration: $request->certificateOfRegistration;
            $deal->financialStatement= is_null($request->financialStatement) ? $deal->financialStatement: $request->financialStatement;
            $deal->cashFlowStatement = is_null($request->cashFlowStatement) ? $deal->cashFlowStatement : $request->cashFlowStatement;
            $deal->contractDocument= is_null($request->contractDocument) ? $deal->contractDocument: $request->contractDocument;
            $deal->auditedAccounts = is_null($request->auditedAccounts) ? $deal->auditedAccounts: $request->auditedAccounts;
         
         
          
            $deal->save();
    
            return response()->json([
                "message" => "Deal record updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Deal not found"
            ], 404);
            
        }
      }
  
      public function deleteDeal ($id) {
        // logic to delete a deal record goes here
        if(Deal::where('id', $id)->exists()) {
            $deal = Deal::find($id);
            $deal->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Deal not found"
            ], 404);
          }
      }
}
