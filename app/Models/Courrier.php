<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courrier extends Model
{
    use HasFactory;

    public $table = 'courrier';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'date_envoi',
        'date_reception',
        'objet_cour',
        'description_cour',
        'statut_cour',
        'id_exp',
        'id_des'
    ];

    protected $cats = [
        'id' => 'integer',
        'date_envoi' => 'date',
        'date_reception' => 'date',
        'objet_cour' => 'string',
        'description_cour' => 'string',
        'statut_cour' => 'string',
        'id_exp' => 'foreign key',
        'id_des' => 'foreign key'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function expediteur()
    {
        return $this->belongsTo(Expediteur::class, 'id_exp');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function destinataire()
    {
        return $this->belongsTo(Destinataire::class, 'id_des');
    }
    
    /**
        * Get the comments for the blog post.
    */
    public function Agent()
    {
        return $this->hasMany(\App\Models\Agentsc::class, 'id_sc');
    }
}
