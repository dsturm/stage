<?php

namespace Stage\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Event extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $event = new FieldsBuilder('event', ['seamless' => true, 'hide_on_screen' => ['the_content']]);

        $event
            ->setLocation('post_type', '==', 'event');

        $event
            ->addTaxonomy('event_category', ['field_type' => 'radio', 'taxonomy' => 'event_category', 'allow_null' => 0, 'add_term' => 1, 'save_terms' => 1, 'load_terms' => 1])
            ->addGoogleMap('location')
            ->addDateTimePicker('event_start')
            ->addDateTimePicker('event_end');

        return $event->build();
    }
}
