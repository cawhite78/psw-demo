<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnonUserActivity
 *
 * @package App\Models
 * @property-read \App\Models\AnonUser $user
 * @mixin \Eloquent
 * @property int $id
 * @property string $anon_user
 * @property string $anon_session
 * @property string|null $search
 * @property string|null $views
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUserActivity whereAnonSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUserActivity whereAnonUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUserActivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUserActivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUserActivity whereSearch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUserActivity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnonUserActivity whereViews($value)
 */
class AnonUserActivity extends Model
{
    protected $table = 'anon_user_activity';
    public $primaryKey = 'id';
    protected $guarded = [];
    protected $hidden = [];
    public $incrementing = true;
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\AnonUser','id','anon_user');
    }

}
