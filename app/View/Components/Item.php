<?php

namespace Stage\View\Components;

use Roots\Acorn\View\Component;

class Item extends Component
{
    public $item;

    protected $view = 'components.item';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item = null)
    {
        $this->item = $item ?? \get_post();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view($this->view);
    }
}
