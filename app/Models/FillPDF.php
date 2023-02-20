<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FillPDF extends Model
{
    use HasFactory;
    protected $fillable =  ['name',
    'sex',
    'phone',
    'certificate_num',
    'year',
    'training_centre',
    'lga',
    'lga_code',
    'institution',
    'institution_code',
    'photo',
];
}
