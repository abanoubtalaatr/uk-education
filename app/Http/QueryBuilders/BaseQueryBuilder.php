<?php

namespace App\Http\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Traits\ForwardsCalls;

class BaseQueryBuilder
{
    use ForwardsCalls;

    protected ?array $allowedFilters = [];

    protected Builder $subject;

    public function __construct(Builder $subject)
    {
        $this->subject = $subject;
    }

    public function __call($name, $arguments)
    {
        $result = $this->forwardCallTo($this->subject, $name, $arguments);

        /*
         * If the forwarded method call is part of a chain we can return $this
         * instead of the actual $result to keep the chain going.
         */
        if ($result === $this->subject) {
            return $this;
        }

        return $result;
    }
}
