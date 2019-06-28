<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CostsFilters;
use Illuminate\Http\Request;

class Costs extends Model
{

    protected $fillable = ['type_costs_id', 'amount', 'description'];

    public function typeCosts()
    {
        return $this->hasOne('App\Models\TypeCosts', 'id', 'type_costs_id');
    }

    public function scopeFilters($query, Request $reqest)
    {   
        $query->with('typeCosts');
        $query->select('costs.*', 'type_costs.name');
        $query->join('type_costs', 'costs.type_costs_id', '=', 'type_costs.id');
        
        $filtets = new CostsFilters($reqest);

        return $filtets->apply($query);
    }
}
