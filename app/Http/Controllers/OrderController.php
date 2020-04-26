<?php

namespace App\Http\Controllers;

use App\Config;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\Order as OrderResource;

class OrderController extends Controller
{
    /**
     * Save new order
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveOrder(Request $req)
    {
        $result = false;
        DB::beginTransaction();

        try {
            $user = User::where('email', $req->email)->first();
            $userId = 0;
            if ($user) {
                $userId = $user->id;
            } else {
                // create user if not exist
                $newUser = new User();
                $newUser->email = $req->email;
                $newUser->address = $req->address;
                $newUser->password = Hash::make(12345);
                $newUser->save();
                $userId = $newUser->id;
            }
            // create new order
            $order = new Order();
            $order->user_id = $userId;
            $order->delivery_cost = Config::DELIVERY_COSTS;
            $order->items = json_encode($req->items);
            $order->save();
            if ($order->id) {
                DB::commit();
                $result = true;
            }
        } catch (\Throwable $e) {
            Log::error($e);
            DB::rollback();
        }
        return response()->json(['result' => $result]);
    }

    /**
     * Get orders history
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     */
    public function history(Request $req)
    {
        $result = false;
        $user = User::where('email', $req->email)->first();
        if ($user) {
            $result = true;
        }
        return response()->json([
            'result' => $result,
            'items' => $result ? OrderResource::collection($user->orders) : [],
        ]);
    }
}
