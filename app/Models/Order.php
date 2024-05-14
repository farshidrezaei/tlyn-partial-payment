<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use App\Enums\OrderTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected function casts(): array
    {
        return [
            'type' => OrderTypeEnum::class,
            'status' => OrderStatusEnum::class,
        ];
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function revoke(): void
    {
        $this->update(['status' => OrderStatusEnum::REVOKED]);
        $this->delete();
    }
}
