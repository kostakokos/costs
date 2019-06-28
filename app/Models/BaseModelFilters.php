<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseModelFilters
{
    protected $reqest;

    public function __construct(Request $reqest)
    {
        $this->reqest = $reqest;
    }

    public function apply(Builder $query)
    {
        $array = $this->reqest->all();

        foreach ($array as $filter => $value) {
            if(method_exists($this, $filter) && !empty($value)) {
                $this->$filter($query, $value);
            }
        }

        if(!empty($array['sort'])) {
            $this->sort($query, $array['sort']);
        }
    }

    protected function sort($query, $sort)
    {
        $array_list = explode('-', $sort);
        if (count($array_list) == 2) {
            list($field, $key) = $array_list;
            $res1 = isset($this->fieldsSort[$field]);
            $res2 = in_array($key, ['asc', 'desc']);
            if ($res1 && $res2) {
                $query->orderBy($this->fieldsSort[$field], $key);
            }
        }
    }
}