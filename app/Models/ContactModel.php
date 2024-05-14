<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $table = "contact_us";
    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'message'];
}
