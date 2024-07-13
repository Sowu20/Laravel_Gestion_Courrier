<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agentsc extends Model
{
    use HasFactory;

    public $table = 'agentsc';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'nom_sc',
        'description_sc',
        'adr_sc'
    ];

    protected $casts = [
        'id' => 'integer',
        'nom_sc' => 'string',
        'description_sc' => 'string',
        'adr_sc' => 'string'
    ];

    /**
        * Get the comments for the blog post.
    */
    public function courriers()
    {
        return $this->hasMany(\App\Models\Courrier::class, 'id_sc');
    }
}
