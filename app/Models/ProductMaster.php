<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class ProductMaster
 *
 * @package App\Models
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
