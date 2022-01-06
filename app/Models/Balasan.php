<?php

namespace App\Models;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Balasan extends Model
{
    use HasFactory;

    protected $table = 'balasans';
    protected $guarded = 'id';
    protected $fillable = [
        'laporan_id',
        'status_id',
    ];

    /**
     * Get the laporan that owns the Balasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laporan(): BelongsTo
    {
        return $this->belongsTo(Laporan::class);
    }

    /**
     * Get the status that owns the Balasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
