<?php

namespace Stage\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class Event extends \AcornDB\Model\Post
{
    protected $postType = 'event';

    protected $casts = [
        'event_start' => 'datetime',
        'event_end' => 'datetime',
    ];

    public function categories()
    {
        return $this->belongsToMany(JobCategory::class, 'term_relationships', 'object_id', 'term_taxonomy_id');
    }

    public function scopeWithEventCategories($query, array $categories)
    {
        $query
            ->whereHas(
                'categories',
                $filter = function ($query) use ($categories) {
                    if (Arr::first(
                        $categories, function ($item) {
                            return ! \is_numeric($item);
                        }
                    )
                    ) {
                        $query->whereIn('name', $categories);
                    } else {
                        $query->whereIn('term_id', $categories);
                    }
                }
            )
            ->with(['categories' => $filter]);
    }

    public function scopeWithLocation($query)
    {
        $query
            ->whereHas(
                'meta',
                $filter = function ($query) {
                    $query->whereIn('meta_key', ['location', 'city']);
                }
            )
            ->with(['meta' => $filter]);
    }

    public function scopeWithPublished($query)
    {
        $query
            ->status('publish');
    }

    public function getEventStartAttribute()
    {
        return $this->meta->event_start ? Carbon::parse($this->meta->event_start) : null;
    }

    public function getEventEndAttribute()
    {
        return $this->meta->event_end ? Carbon::parse($this->meta->event_end) : null;
    }

    public function getCityAttribute()
    {
        return $this->extractLocationData('city');
    }

    public function getStateAttribute()
    {
        return $this->extractLocationData('state');
    }

    /**
     * Undocumented function.
     *
     * @param  string $key
     * @return string|null
     */
    protected function extractLocationData($key) : ?string
    {
        $data = $this->meta->{$key} ?? null;

        if ($data || ! isset($this->meta->location)) {
            return $data;
        }

        $location = is_string($this->meta->location) ?
        \unserialize($this->meta->location) :
        $this->meta->location;

        return trim($location[$key] ?? null);
    }
}
