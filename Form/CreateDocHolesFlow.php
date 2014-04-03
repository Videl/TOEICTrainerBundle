<?php

namespace TN\TOEICTrainerBundle\Form;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;
use Symfony\Component\Form\FormTypeInterface;

class CreateDocHolesFlow extends FormFlow {

    /**
     * @var FormTypeInterface
     */
    protected $formType;

    public function setFormType(FormTypeInterface $formType) {
        $this->formType = $formType;
    }

    public function getName() {
        return 'docholes_flow';
    }

    protected function loadStepsConfig() {
        return array(
            array(
                'label' => 'Document',
                'type' => $this->formType,
            ),
            array(
                'label' => 'Choose the word holes',
                'type' => $this->formType,
                //'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                //    return $estimatedCurrentStepNumber > 1 && !$flow->getFormData()->canHaveEngine();
                },
            ),
            array(
                'label' => 'Confirmation',
            ),
        );
    }
}