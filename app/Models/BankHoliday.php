<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankHoliday extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = ['date'];

    public static function forYear(int $year = null)
    {
        if ($year) {
            return self::whereYear('date', $year)->get();
        }

        return self::all();
    }
}
