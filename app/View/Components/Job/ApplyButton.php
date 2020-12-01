<?php

namespace Stage\View\Components\Job;

use Roots\Acorn\View\Component;

class ApplyButton extends Component
{
    public $id;

    protected $view = 'components.job.apply-button';

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
