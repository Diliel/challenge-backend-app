<?php

namespace App\Models\Challenge\Airline;

use App\Models\Traits\RelationshipsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\UuidTrait;

class Airline extends Model
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
        'price',
        'scales',
        'duration_at',
        'duration_end',
        'short_code',
        'long_code',
        'order_record',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
