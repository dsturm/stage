<?php

namespace Stage\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class EventList extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Event List';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Lists events.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['event', 'events', 'list', 'finder'];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [
    'page'
    ];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = 'full';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => false,
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'limit' => 5,
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
        'showFinder' => $this->showFinder(),
        'limit' => $this->limit(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $eventList = new FieldsBuilder('event_list');

        $eventList
            ->addTrueFalse('show_finder', ['default_value' => 1])
            ->addNumber('limit', ['default_value' => $this->example['limit'], 'min' => 3, 'max' => 10]);

        return $eventList->build();
    }

    /**
     * Wether to embed finder form.
     *
     * @return bool
     */
    public function showFinder() : bool
    {
        return !! get_field('show_finder');
    }

    /**
     * Return the limit field.
     *
     * @return array|null
     */
    public function limit() : ? int
    {
        return get_field('limit') ?: $this->example['limit'];
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
