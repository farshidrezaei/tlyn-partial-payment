<?php

namespace App\Http\Resources;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Order */
class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'type' => $this->type->value,
            'status' => $this->type->value,
            'amount' => $this->amount,
            'price' => $this->price,

            'user' => $this->whenLoaded('user', UserResource::make($this->user)),
        ];
    }
}
