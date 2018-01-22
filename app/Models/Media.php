<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Media
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $product_id
 * @property string $filename
 * @property int $is_primary
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media whereUpdatedAt($value)
 */
class Media extends Model
{
    //
}
