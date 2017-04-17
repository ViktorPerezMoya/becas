<?php

class Default_Form_FamiliarForm extends Zend_Form
{

    public function init()
    {
        /* DATOS PERSONALES */
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control','placeholder'=>'Ingrese Nombre'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $nombre->setLabel('Nombre Completo: ');
        
        $dni = new Zend_Form_Element_Text('dni');
        $dni->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addFilter('Digits')
                ->setAttribs(array('class' => 'form-control','placeholder'=>'Ingrese DNI'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $dni->setLabel('DNI: ');
        
        $edad = new Zend_Form_Element_Text('edad');
        $edad->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addFilter('Digits')
                ->setAttribs(array('class' => 'form-control', 'min' => 0,'placeholder'=>'Ingrese edad'))
                ->addErrorMessage('Campo requerido');
        $edad->setLabel('Edad: ');
        
        $ingreso = new Zend_Form_Element_Text('ingreso');
        $ingreso->addFilter('StripTags')
                ->addFilter('Digits')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control', 'min' => 0,'placeholder'=>'Ingrese monto de ingreso mensual'))
                ->addErrorMessage('Campo requerido');
        $ingreso->setLabel('Ingreso: ');
        
        $parentesco = new Zend_Form_Element_Select('parentesco');
        $parentesco->setLabel('Parentesco')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $parentesco->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Padre" => "Padre",
            "Madre" => "Madre",
            "Hermano" => "Hermano",
            "Hermana" => "Hermana",
            "Hijo" => "Hijo",
            "Beneficiario" => "Beneficiario",
            "Beneficiaria" => "Beneficiaria"
        ));
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        $submit->setAttribs(array('class' => 'btn btn-primary'));
        
        $this->addElements(array($nombre, $dni, $edad, $ingreso,$parentesco,$submit));
    }


}

