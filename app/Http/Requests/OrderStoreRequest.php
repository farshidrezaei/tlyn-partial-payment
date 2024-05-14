<?php

namespace App\Http\Requests;

use App\Enums\OrderTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required', Rule::enum(OrderTypeEnum::class)],
            'amount' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:1000'],
        ];
    }

    public function authorize(): true
    {
        return true;
    }
}
