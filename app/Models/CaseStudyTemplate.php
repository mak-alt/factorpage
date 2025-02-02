<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 */
class CaseStudyTemplate extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'img', 'code', 'created_at', 'updated_at'];
}
