<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'data_inici',
        'data_final',
        'n_places',
        'id_ciutat'
    ];

    public function ciutats() {
        return $this->belongsTo(Ciutat::class, 'id_ciutat', 'id');
    }
}
