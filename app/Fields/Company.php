<?php

namespace Stage\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Company extends Field
{
    /**
     * Fields to be registered with the application.
     *
     * @return array
     */
    public function fields()
    {
        $field = new FieldsBuilder('company', ['graphql_field_name' => 'company']);

        $field
            ->addWysiwyg('description')
            ->addImage('logo')
            ->addImage('image')
            ->addLink('website');

        $field
            ->setLocation('taxonomy', '==', 'company');

        return $field->build();
    }
}
