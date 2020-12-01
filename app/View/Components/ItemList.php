<?php

namespace Stage\View\Components;

use Roots\Acorn\View\Component;

class ItemList extends Component
{
    public $title;

    public $limit;

    public $post_type;

    /**
     * A container for queried results.
     *
     * @var array
     */
    public $items = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $title = null, ?string $query = null, ?int $limit = null)
    {
        $this->title = $title;
        $this->query = $query;
        $this->limit = $limit ?? 5;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.item-list');
    }
}
