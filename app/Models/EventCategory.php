<?php

namespace Stage\Models;

use Stage\Models\Event;

class EventCategory extends \AcornDB\Model\Taxonomy
{
    protected $taxonomy = 'event_category';

    public function events()
    {
        return $this->belongsToMany(
            Event::class,
            'term_relationships',
            'term_taxonomy_id',
            'object_id'
        );
    }
}
