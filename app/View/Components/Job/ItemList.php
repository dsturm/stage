<?php

namespace Stage\View\Components\Job;

use Stage\Models\Job;
use Stage\View\Components\ItemList as BaseList;

class ItemList extends BaseList
{
    public $post_type = 'job';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $title = null, ?string $query = null, ?int $limit = null)
    {
        parent::__construct(...\func_get_args());

        $this->items = Job::newest()
            ->published()
            ->take($this->limit)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.job.item-list');
    }
}
