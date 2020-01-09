<?php

namespace App\Http\Controllers;
use App\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showAllUsers()
    {
        
              // logic to get all users goes here
              $users = user::get()->toJson(JSON_PRETTY_PRINT);
              return response($users, 200);
    }
    public function getAgentUser($user_role) {
        // logic to get a agent user record goes here
        if (User::where('user_role', $user_role)->exists()) {
            $user = User::where('user_role', $user_role)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "User not found"
            ], 404);
          }
         
      }
      public function getInvestorUser($user_role) {
        // logic to get investor user record goes here
        if (User::where('user_role', $user_role)->exists()) {
            $user = User::where('user_role', $user_role)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "Investor not found"
            ], 404);
          }
      }
      public function deleteAgentUser ($id) {
        // logic to delete user record goes here
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();
    
            return response()->json([
              "message" => "user deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "user not found"
            ], 404);
          }
      }
    
      public function deleteInvestorUser ($id) {
        // logic to delete user record goes here
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();
    
            return response()->json([
              "message" => "user deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "user not found"
            ], 404);
          }
      }
      public function verifyUser(Request $request, $id) {
        // logic to verify user 
  
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->status = is_null($request->status) ? $offer->status: $request->status;
            
          
            $user->save();
    
            return response()->json([
                "message" => "User verified successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "user not found"
            ], 404);
            
        }
      }
      public function deverifyUser(Request $request, $id) {
        // logic to verify user 
  
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->status = is_null($request->status) ? $offer->status: $request->status;
            
          
            $user->save();
    
            return response()->json([
                "message" => "User de-verified successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "user not found"
            ], 404);
            
        }
      }
}
