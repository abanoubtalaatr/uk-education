<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class EventQueryBuilder extends Builder
{
    /**
     * Search for a keyword in name, description, or agenda fields.
     *
     * @param string $searchKeyword
     *
     * @return \App\QueryBuilders\EventQueryBuilder
     */
    public function search(string $searchKeyword): EventQueryBuilder
    {
        $upperSearchKeyword = strtoupper($searchKeyword);

        return $this->where(function (Builder $builder) use ($searchKeyword, $upperSearchKeyword) {
            $builder->whereRaw("upper(name) like '%$upperSearchKeyword%'")
                ->orWhereRaw("upper(description) like '%$upperSearchKeyword%'")
                ->orWhereRaw("upper(agenda) like '%$upperSearchKeyword%'")
                ->orWhereHas('interests', function (Builder $query) use ($upperSearchKeyword) {
                    $query->whereRaw("upper(name) like '%$upperSearchKeyword%'");
                });
        });
    }

    /**
     * Get events that certain user is attending.
     *
     * @param int $userId
     *
     * @return \App\QueryBuilders\EventQueryBuilder
     */
    public function forUser(int $userId): EventQueryBuilder
    {
        return $this->whereHas('users', function (Builder $builder) use ($userId) {
            $builder->where('users.id', $userId);
        });
    }

    /**
     * Get events that are in the future.
     *
     * @return \App\QueryBuilders\EventQueryBuilder
     */
    public function future(): EventQueryBuilder
    {
        return $this->whereDate('end_date', '>', now()->format('Y-m-d H:i:s'));
    }

    /**
     * Get events that are in the past.
     *
     * @return \App\QueryBuilders\EventQueryBuilder
     */
    public function past(): EventQueryBuilder
    {
        return $this->whereDate('end_date', '<', now()->format('Y-m-d H:i:s'));
    }
}
