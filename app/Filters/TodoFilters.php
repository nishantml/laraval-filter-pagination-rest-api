<?php

namespace App\Filters;

use Illuminate\Http\Request;

class TodoFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function name($term = '')
    {
        return $this->builder->where('name', 'LIKE', "%$term%");
    }

    public function assigned_to($term = null)
    {
        return $this->builder->where('assigned_to', $term);
    }

    public function start_date($term = '')
    {
        return $this->builder->where('start_date', '>=', $term);
    }

    public function due_date($term = '')
    {
        return $this->builder->where('due_date', '<=', $term);
    }


    public function status($term = 'todo')
    {
        return $this->builder->where('status', $term);
    }

    public function priority($term = 'low')
    {
        return $this->builder->where('priority', $term);
    }

    public function sort($type = null)
    {
        return $this->builder->orderBy('id', (!$type || $type == 'asc') ? 'desc' : 'asc');
    }


}
