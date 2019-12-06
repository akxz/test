<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    /**
     * Родительские элементы
     */
    public function parents()
    {
        return $this->belongsToMany('App\Element', 'submenu', 'child_id', 'parent_id');
    }

    /**
     * Потомки элемента
     */
    public function children()
    {
        return $this->belongsToMany('App\Element', 'submenu', 'parent_id', 'child_id');
    }
}
