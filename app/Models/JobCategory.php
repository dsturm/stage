<?php

namespace Stage\Models;

use Stage\Models\Job;

class JobCategory extends \AcornDB\Model\Taxonomy
{
    protected $taxonomy = 'job_category';

    public function jobs()
    {
        return $this->belongsToMany(
            Job::class,
            'term_relationships',
            'term_taxonomy_id',
            'object_id'
        );
    }
}
