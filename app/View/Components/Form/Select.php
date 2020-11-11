<?php

namespace Stage\View\Components\Form;

use Illuminate\Support\Str;
use Roots\Acorn\View\Component;

class Select extends Component
{
    public $id;

    public $label;

    public $placeholder = true;

    public $items = [];

    protected $selected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        ?string $label = null,
        $items = null,
        $id = null,
        $placeholder = null
    ) {
        $this->placeholder = $placeholder;
        $this->label = $label ?? $this->placeholder;
        $this->items = $items ?? [];

        $this->id = $id ?? Str::slug($this->label);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.form.select');
    }

    /**
     * Determine if the given option is the current selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isSelected($option)
    {
        return $option === $this->selected;
    }
}
