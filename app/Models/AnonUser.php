<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnonUser
 *
 * @package App
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AnonUserActivity[] $activity
 * @mixin \Eloquent
 * @property string $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUser whereUpdatedAt($value)
 */
class AnonUser extends Model
{
    protected $table = 'anon_user';
    protected $guarded = [];
    protected $hidden = [];
    public $incrementing = false;
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->hasMany('App\Models\AnonUserActivity','id','anon_user');
    }
}
