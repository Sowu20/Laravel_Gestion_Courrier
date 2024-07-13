<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expediteur extends Model
{
    use HasFactory;

    public $table = 'expediteur';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'nom_exp',
        'prenom_exp',
        'adr_exp',
        'entreprise_exp'
    ];

    protected $casts = [
        'id' => 'integer',
        'nom_exp' => 'string',
        'prenom_exp' => 'string',
        'adr_exp' => 'string',
        'entreprise_exp' => 'string'
    ];

    /**
        * Get the comments for the blog post.
    */
    public function courriers()
    {
        return $this->hasMany(\App\Models\Courrier::class, 'id_exp');
    }
}
