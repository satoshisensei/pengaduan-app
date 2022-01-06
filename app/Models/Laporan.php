<?php

namespace App\Models;

use App\Models\Rt;
use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans';
    protected $guarded = 'id';
    protected $fillable = [
        'masyarakat_id',
        'rt_id',
        'tujuan',
        'anggaran',
        'rincian',
        'total',
        'file',
    ];

    /**
     * Get the masyarakat that owns the Laporan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function masyarakat(): BelongsTo
    {
        return $this->belongsTo(Masyarakat::class);
    }

    /**
     * Get the rt that owns the Laporan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rt::class);
    }
}
