<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destinataire extends Model
{
    use HasFactory;

    public $table = 'destinataire';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'nom_des',
        'prenom_des',
        'adr_des',
        'entreprise_des'
    ];

    protected $casts = [
        'id' => 'integer',
        'nom_des' => 'string',
        'prenom_des' => 'string',
        'adr_des' => 'string',
        'entreprise_des' => 'string'
    ];

    /**
        * Get the comments for the blog post.
    */
    public function courriers()
    {
        return $this->hasMany(\App\Models\Courrier::class, 'id_des');
    }
}
