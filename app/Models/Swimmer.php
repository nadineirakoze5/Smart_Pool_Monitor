<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swimmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'heart_rate',
        'hydration',
        'oxygen_level',
        'temperature',
        'time_in_pool',
        'status',
    ];

    // Belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Has many alerts
    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }
}
