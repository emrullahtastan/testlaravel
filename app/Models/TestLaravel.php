<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestLaravel extends Model
{
    use HasFactory;
    protected $table="testlaravel";
    public $timestamps=true;

    protected $fillable=["name","created_at"];
}
