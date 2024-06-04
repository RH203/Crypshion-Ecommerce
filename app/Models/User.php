<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\app\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;


    const AVATAR = 'avatar.png';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'phone_number',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    /**
     * Get all of the order for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }


    /**
     * Get all of the cart for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    /**
     * Get all of the transaction for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    /**
     * Get all of the product for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'user_id');
    }


    /**
     * Get all of the notification for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notification(): HasMany
    {
        return $this->hasMany(Notification::class, 'user_id');
    }


    /**
     * Get all of the rating for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rating(): HasMany
    {
        return $this->hasMany(Rating::class, 'user_id');
    }


    /**
     * Get the province that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Get the regency that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }


    /**
     * Get the district that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }


    /**
     * Get the village that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }
}
