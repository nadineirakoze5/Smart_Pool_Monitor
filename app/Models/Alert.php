<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'swimmer_id',
        'type',
        'message',
        'resolved',
    ];

    // Belongs to a swimmer
    public function swimmer()
    {
        return $this->belongsTo(Swimmer::class);
    }
}
