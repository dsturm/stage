<?php

namespace Stage\View\Components\Job;

use Roots\Acorn\View\Component;
use Stage\Models\Job;
use Stage\Models\JobCategory;

class Finder extends Component
{
    public $title;

    public $locations = [];

    public $categories = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $title = null)
    {
        $this->title = $title ?? __('Find your new job', 'stage');

        $this->categories = JobCategory::has('jobs')
            ->get()
            ->pluck('term.name', 'term.slug')
            ->sort();

        $this->locations = Job::published()
            ->get()
            ->map(
                function ($item) {
                    $location = \maybe_unserialize($item->meta->location);

                    return $location['state'] ?? null;
                }
            )
            ->unique()
            ->sort();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.job.finder');
    }
}
