<?php

declare(strict_types=1);

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Classes
 *
 * @package App\Models\Classes
 */
class Classes extends Model
{
    /**
     * @var string
     */
    protected $table = 'class';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'hour',
        'weeks_day',
        'price',
        'actived',
        'created_at',
    ];

    /**
     * @var bool
     */
    public $timestamp = false;

    /**
     * @var array
     */
    public array $rules = [
        'name' => 'required|string|max:45',
        'hour' => 'required|date-format:H:i:s|max:6',
        'weeks_day' => 'required|string|max:12',
        'price' => 'required|numeric',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classStudent(){
        return $this->hasMany(ClassStudent::class, 'idclass');
    }
}
