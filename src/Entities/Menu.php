<?php namespace IA\LaravelNavigation\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use Sluggable;

    protected $table    = 'nav_menus';
    protected $fillable = ['slug', 'name', 'items'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
