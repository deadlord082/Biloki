<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'price_at_sale',
        'quantity',
        'customer_name',
        'customer_email',
        'sale_date',
    ];

    protected $casts = [
        'price_at_sale' => 'decimal:2',
        'sale_date' => 'date',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}