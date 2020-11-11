<?php

namespace Stage\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Job extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $job = new FieldsBuilder('job', ['seamless' => true, 'hide_on_screen' => ['the_content']]);

        $job
            ->setLocation('post_type', '==', 'job');

        $job
            ->addTaxonomy('job_category', ['field_type' => 'radio', 'taxonomy' => 'job_category', 'allow_null' => 0, 'add_term' => 1, 'save_terms' => 1, 'load_terms' => 1])
            ->addTaxonomy('job_type', ['taxonomy' => 'job_type', 'allow_null' => 0, 'add_term' => 1, 'save_terms' => 1, 'load_terms' => 1])
            ->addTaxonomy('company', ['field_type' => 'radio', 'taxonomy' => 'company', 'allow_null' => 1, 'add_term' => 1, 'save_terms' => 1, 'load_terms' => 1])
            ->addGoogleMap('location')
            ->addDatePicker('job_start')
            ->addDatePicker('application_end')
            ->addTab('content')
            ->addWysiwyg('responsibilities')
            ->addWysiwyg('qualifications')
            ->addWysiwyg('incentives')
            ->addTrueFalse('override_about', ['default_value' => 1])
            ->addWysiwyg('about', []);

        return $job->build();
    }
}
