<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    // Menetapkan nama tabel yang terkait dengan model ini
    protected $table = 'tasks';

    // Menetapkan kunci utama untuk model ini
    protected $primaryKey = 'task_id';

    // Menentukan field yang bisa diisi melalui mass assignment
    protected $fillable = [
        'user_id',
        'task_name',
        'description',
        'deadline',
        'status',
    ];

    /**
     * Mendefinisikan hubungan 'belongsTo' dengan model User.
     *
     * @return BelongsTo Hubungan antara Task dan User
     */
    public function users(): BelongsTo
    {
        // Mengembalikan instance hubungan yang menunjukkan bahwa setiap Task milik sebuah User
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}