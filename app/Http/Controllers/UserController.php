<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\Operation\InsertMany;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();  

        return response()->json([
            'success' => true,
            'students'=>$users
        ]);
    }
    
    public function store(Request $request)
    {
        $temp = array();
        for($i=0; $i<count($request['user_ids']); $i++)
        {
            $collection = [
                'user_id' => $request['user_ids'][$i],
                'notification_id'=> [
                    'id' =>1 ,
                    'name' => 'test'
                ]
            ];
            $temp [] = $collection;
        }

        User::insert($temp);

       $message ="User Create Sucessflly";

       if(count($request['user_ids'])>1)$message = "Users Create Successfully";
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }
}
