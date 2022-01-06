<?php

namespace App\Models;

use App\Models\Rt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawais';
    protected $guarded = 'id';
    protected $fillable = [
        'rt_id',
        'nama',
        'nip',
        'alamat'
    ];

    /**
     * Get the rt that owns the Masyarakat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rt::class);
    }

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['search'] ?? false, function($query, $search){
    //         return $query->where('nama', 'like', '%' . $search . '%')
    //         ->orWhere('nip', 'like', '%' . $search . '%');
    //     });
    // }
}
