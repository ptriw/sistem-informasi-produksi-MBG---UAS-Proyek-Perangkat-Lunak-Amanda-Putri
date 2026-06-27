<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'produksis';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'kode_produksi',
        'nama_barang',
        'jumlah_produksi',
        'tanggal_produksi',
        'status',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tanggal_produksi' => 'date',
        'jumlah_produksi'  => 'integer',
    ];

    /**
     * Status badge color helper.
     */
    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'Planning'    => 'secondary',
            'On Progress' => 'warning',
            'Done'        => 'success',
            default       => 'secondary',
        };
    }
}
