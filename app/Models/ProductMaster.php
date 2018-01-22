<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class ProductMaster
 *
 * @package App\Models
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int|null $above_ground
 * @property string|null $description
 * @property string $type
 * @property string $brand
 * @property string|null $images
 * @property string|null $primary_image
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereAboveGround($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster wherePrimaryImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMaster whereUpdatedAt($value)
 */
class ProductMaster extends Model
{
    use Searchable;

    /**
     * @var string
     */
    protected $table = 'products_master_fulltext';
    protected $guarded = [];
    protected $hidden = [];
    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'psw_demo_products';
    }
}
