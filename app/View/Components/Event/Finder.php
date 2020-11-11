<?php

namespace Stage\View\Components\Event;

use Roots\Acorn\View\Component;
use Stage\Models\Event;
use Stage\Models\EventCategory;

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
        $this->title = $title;

        $this->categories = EventCategory::has('events')
            ->get()
            ->pluck('term.name', 'term.slug')
            ->sort();

        $this->locations = Event::published()
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
        return $this->view('components.event.finder');
    }
}
