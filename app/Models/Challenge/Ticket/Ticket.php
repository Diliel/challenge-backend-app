<?php

namespace App\Models\Challenge\Ticket;

use App\Models\Traits\RelationshipsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\UuidTrait;

class Ticket extends Model
{
    use HasFactory, SoftDeletes, UuidTrait, RelationshipsTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'hometown',
        'destination',
        'exit_at',
        'return_at',
        'airline_id',
        'short_code',
        'long_code',
        'order_record',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
