<?php

namespace App\Models;

use App\Enums\TableStatus;
use App\Models\Reservation;
use App\Enums\TableLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'guest_number',
        'status',
        'location',
    ];

    // protected $casts = [
    //     'location' => Tablelocation::class,
    //     'status' => TableStatus::class,
    // ];


    /**
     * Get all of the comments for the Table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
