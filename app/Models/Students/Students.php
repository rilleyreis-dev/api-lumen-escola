<?php

declare(strict_types=1);
namespace App\Models\Students;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentsRepository
 * @package App\Models\StudentsRepository
 */
class Students extends Model
{
    /**
     * @var string
     */
    protected $table = 'students';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'birth_date',
        'age',
        'cpf',
        'rg',
        'email',
        'phone',
        'cellphone',
        'actived',
        'created_at',
    ];

    /**
     * @var bool $timestamp
     */
    public $timestamp = false;

    /**
     * @var array $rules
     */
    public array $rules = [
        'name' => 'required|string|max:100',
        'birth_date' => 'required|date',
        'age' => 'required|integer',
        'cpf' => 'required|string|max:20',
        'rg' => 'required|string|max:15',
        'email' => 'required|string|email|max:50|unique:students',
        'phone' => 'required|integer|max:12',
        'cellphone' => 'required|integer|max:12',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classStudent()
    {
        return $this->hasMany(ClassStudent::class, 'idstudents');
    }
}
