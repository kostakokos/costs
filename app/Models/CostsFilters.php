<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CostsFilters extends BaseModelFilters
{
    protected $fieldsSort = [
        'type' => 'type_costs.name',
        'id' => 'id',
        'amount' => 'amount',
    ];

    public function description($query, $value)
    {
        $query->where('description', 'LIKE', "%$value%");
    }

    public function type($query, $value)
    {
        $query->where('type_costs_id', $value);
    }

    public function id($query, $value)
    {
        $query->where('costs.id', $value);
    }

    public function amount($query, $value)
    {
        $query->where('amount', $value);
    }

    public function date($query, $value)
    {
        $query->where('costs.created_at', 'LIKE', "$value%");
    }

}