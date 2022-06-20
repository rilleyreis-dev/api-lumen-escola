<?php

declare(strict_types=1);

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @package App\Models\Employee
 */
class Employee extends Model
{
    /**
     * @var string
     */
    protected $table = 'employee';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'birth_date',
        'document',
        'due_date',
        'cellphone',
        'email',
        'password',
        'actived',
        'created_at',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @var bool
     */
    public $timestamp = false;

    public array $rules = [
        'name' => 'required|string|max:100',
        'birth_date' => 'required|date',
        'document' => 'required|string|max:20',
        'due_date' => 'required|integer',
        'cellphone' => 'required|integer',
        'email' => 'required|string|email|max:75|unique:employee',
        'password' => 'required|string|between:6,12',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}
