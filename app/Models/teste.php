<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class teste
 * @package App\Models
 * @version June 16, 2019, 1:06 pm UTC
 *
 * @property varchar(255) nome
 * @property varchar(255) endereco
 */
class teste extends Model
{
    use SoftDeletes;

    public $table = 'testes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'endereco'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
