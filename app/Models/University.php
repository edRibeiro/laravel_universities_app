<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'universities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['alpha_two_code', 'domains', 'country', 'web_pages', 'name'];

    public const status = [
        'APPROVED' => 'APPROVED',
        'REJECTED' => 'REJECTED',
        'PENDING' =>  'PENDING'
    ];

    public const STATUS_APPROVED = 'APPROVED';
    public const STATUS_REJECTED = 'REJECTED';
    public const STATUS_PENDING = 'PENDING';

    public function users()
    {
        return $this->belongsToMany(User::class, 'universities_users', 'university_id', 'user_id');
    }

    public function suggestedBy()
    {
        return $this->belongsTo(User::class);
    }
}
