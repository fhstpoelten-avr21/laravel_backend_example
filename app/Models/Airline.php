<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Airline
 *
 * @property int id
 * @property string name
 * @property string|null country
 * @property string|null logo
 * @property string|null slogan
 * @property string|null head_quaters
 * @property string|null website
 * @property string|null established
 * @package App\Models
 */
class Airline extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'country',
        'logo',
        'slogan',
        'head_quaters',
        'website',
        'established',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
