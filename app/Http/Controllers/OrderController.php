<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;
use App\Http\Requests\PaginationRequest;
use App\Http\Requests\OrderStoreRequest;

class OrderController extends Controller
{
    public function index(PaginationRequest $request)
    {
        $orders = Order::paginate($request->validated('per_page'));

        return OrderResource::collection($orders);
    }

    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    public function store(OrderStoreRequest $request)
    {
        $order=Auth::user()->orders()->create($request->validated());
        // logic
        return new OrderResource($order);
    }


    public function destroy(Order $order)
    {
        $order->revoke();
        return new OrderResource($order);
    }
}
