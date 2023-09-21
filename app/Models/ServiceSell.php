<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class ServiceSell extends BaseModel
{
    use HasFactory;
    use SearchableTrait;
    protected $guarded = [];
    protected $with = ['category_service_sell'];

    protected $searchable = [
        'columns' => [
            'service_sells.name' => 10,
        ],
    ];

    function category_service_sell()
    {
        return $this->belongsTo(CategoryServiceSell::class, 'category_service_sell_id', 'id');
    }

    public function getImagesAttribute($value)
    {
        return json_decode($value);
    }

    public function getTotalViewsAttribute()
    {
        return DB::table('service_sells')->where('id', $this->id)->count();
    }
}
