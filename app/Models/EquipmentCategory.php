<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model
{
    use \Czim\Listify\Listify;

    public function __construct(array $attributes = array(), $exists = false) {

        parent::__construct($attributes, $exists);

        $this->initListify();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position', 'active'];
}
