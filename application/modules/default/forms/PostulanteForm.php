<?php

class Default_Form_PostulanteForm extends Zend_Form {

    public function init() {
        $this->setName('Postulante');
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');

        /* DATOS PERSONALES */
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control','placeholder'=>'Ingrese Nombre'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $nombre->setLabel('Nombre: ');

        $apellido = new Zend_Form_Element_Text('apellido');
        $apellido->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control','placeholder'=>'Ingrese Apellido'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $apellido->setLabel('Apellido: ');

        $dni = new Zend_Form_Element_Text('dni');
        $dni->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control','placeholder'=>'Ingrese DNI'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $dni->setLabel('DNI: ');

        $cuil = new Zend_Form_Element_Text('cuil');
        $cuil->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control','placeholder'=>'Ingrese CUIL'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $cuil->setLabel('CUIL: ');


        $fechaNac = new Zend_Form_Element_Text('fechanacimiento');
        $fechaNac->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $fechaNac->setLabel('Fecha de nacimiento: ');

        $telefono = new Zend_Form_Element_Text('telefono');
        $telefono->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control', 'min' => 0,'placeholder'=>'Ingrese numero de teléfono'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $telefono->setLabel('Telefono: ');


        $celular = new Zend_Form_Element_Text('celular');
        $celular->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control', 'min' => 0,'placeholder'=>'Ingrese celular'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $celular->setLabel('Celular: ');

        $email = new Zend_Form_Element_Text('email');
        $email->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control', 'min' => 0,'placeholder'=>'example@dominio.com'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $email->setLabel('Email: ');

        $puntajeentrevista = new Zend_Form_Element_Text('puntajeentrevista');
        $puntajeentrevista->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control','placeholder'=>'0'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $puntajeentrevista->setLabel('Puntaje de Entrevista: ');

        $datosPers = new Zend_Form_SubForm();
        $datosPers->setLegend("Datos Personales");
        $datosPers->addElements(array($nombre, $apellido, $dni, $cuil, $fechaNac, $telefono, $celular, $email, $puntajeentrevista));

        /* DATOS DOMICILIO */

        $distrito = new Zend_Form_Element_Select('distrito');
        $distrito->setLabel('Distrito')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $distrito->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Villa Tulumaya" => "Villa Tulumaya",
            "Jocolí Viejo" => "Jocolí Viejo",
            "Jocolí" => "Jocolí",
            "La Bajada" => "La Bajada",
            "El Carmen" => "El Carmen",
            "El Chilcal" => "El Chilcal",
            "La Asunción" => "La Asunción",
            "La Pega" => "La Pega",
            "La Palmera" => "La Palmera",
            "La Holanda" => "La Holanda",
            "Lagunas del Rosario" => "Lagunas del Rosario",
            "Alto del Olvido" => "Alto del Olvido",
            "Las Violetas" => "Las Violetas",
            "Colonia Italia" => "Colonia Italia",
            "Costa de Araujo" => "Costa de Araujo",
            "Tres de Mayo" => "Tres de Mayo",
            "Gustavo Andre" => "Gustavo Andre",
            "El Vergel" => "El Vergel",
            "El Paramillo" => "El Paramillo",
            "Oscar Mendoza" => "Oscar Mendoza",
            "San Francisco" => "San Francisco",
            "San Jose" => "San Jose",
            "El Plumero" => "El Plumero",
            "San Miguel" => "San Miguel"
        ));

        $domicilio = new Zend_Form_Element_Text('domicilio');
        $domicilio->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control', 'min' => 0,'placeholder'=>'Ingrese domicilio de establecimiento'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $domicilio->setLabel('Domicilio: ');

        $propiedadvivienda = new Zend_Form_Element_Select('propiedadvivienda');
        $propiedadvivienda->setLabel('Propiedad de vivienda')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $propiedadvivienda->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Propia" => "Propia",
            "Propia con deuda" => "Propia con deuda",
            "Prestada/Cedida" => "Prestada/Cedida",
            "Ubicada en terrenos fiscales / usurpada" => "Ubicada en terrenos fiscales / usurpada",
            "Alquilada" => "Alquilada"
        ));

        $datosDomicilio = new Zend_Form_SubForm();
        $datosDomicilio->setLegend("Datos de Domicilio");
        $datosDomicilio->addElements(array($distrito, $domicilio, $propiedadvivienda));

        /* DATOS ACADEMICOS */

        $carrera = new Zend_Form_Element_Select('carrera');
        $carrera->setLabel('Carrera')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $carrera->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "(DE GRADO)Orientadas a las Ingenierias" => "(DE GRADO)Orientadas a las Ingenierias",
            "(DE GRADO)Orientadas a las Ciencias de la Salud" => "(DE GRADO)Orientadas a las Ciencias de la Salud",
            "(DE GRADO)Orientadas a las Ciencias Económicas" => "(DE GRADO)Orientadas a las Ciencias Económicas",
            "(DE GRADO)Orientadas a las Ciencias de la Educación" => "(DE GRADO)Orientadas a las Ciencias de la Educación",
            "(DE GRADO)Orientadas a las Ciencias Sociales y Humanas" => "(DE GRADO)Orientadas a las Ciencias Sociales y Humanas",
            "(TECNICATURAS)Orientadas a la producion agraria y/o alimentaria" => "(TECNICATURAS)Orientadas a la producion agraria y/o alimentaria",
            "(TECNICATURAS)Orientadas a las Ciencias de la Salud" => "(TECNICATURAS)Orientadas a las Ciencias de la Salud",
            "(TECNICATURAS)Orientadas a las Ciencias Economicas" => "(TECNICATURAS)Orientadas a las Ciencias Economicas",
            "(TECNICATURAS)Orientadas a las Ciencias de la Educación" => "(TECNICATURAS)Orientadas a las Ciencias de la Educación",
            "(TECNICATURAS)Orientadas a las Sociales y Humanas" => "(TECNICATURAS)Orientadas a las Sociales y Humanas"
        ));

        $nombrecarrera = new Zend_Form_Element_Text('nombrecarrera');
        $nombrecarrera->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttribs(array('class' => 'form-control', 'min' => 0,'placeholder'=>'Ingrese nombre de carrera'))
                ->setRequired()
                ->addErrorMessage('Campo requerido');
        $nombrecarrera->setLabel('Nombre de carrera: ');

        $direccioncarrera = new Zend_Form_Element_Select('direccioncarrera');
        $direccioncarrera->setLabel('Direccion')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $direccioncarrera->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Lavalle" => "Lavalle",
            "Ciudad" => "Ciudad",
            "U.N.C / Godoy Cruz" => "U.N.C / Godoy Cruz",
            "Rodeo del Medio / Lujan de Cuyo" => "Rodeo del Medio / Lujan de Cuyo"
        ));

        $nivelacademico = new Zend_Form_Element_Select('nivelacademico');
        $nivelacademico->setLabel('Nivel academico')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $nivelacademico->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "9 o más" => "9 o más",
            "8,99 a 8" => "8,99 a 8",
            "7,99 a 7" => "7,99 a 7",
            "6,99 a 6" => "6,99 a 6",
            "5,99 o menos" => "5,99 o menos"
        ));

        $datosAcademicos = new Zend_Form_SubForm();
        $datosAcademicos->setLegend("Datos Academicos");
        $datosAcademicos->addElements(array($carrera, $nombrecarrera, $direccioncarrera, $nivelacademico));

        /* DATOS DE FAMILIA */
        $obrasocial = new Zend_Form_Element_Select('obrasocial');
        $obrasocial->setLabel('Obra social')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $obrasocial->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Toda La Familia" => "Toda La Familia",
            "Algunos Integrantes" => "Algunos Integrantes",
            "Ninguna" => "Ninguna"
        ));

        $hijosprimaria = new Zend_Form_Element_Select('hijosprimaria');
        $hijosprimaria->setLabel('Hijos en escuela primaria')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $hijosprimaria->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Ninguno" => "Ninguno",
            "Uno o mas" => "Uno o mas"
        ));

        $hijossecundaria = new Zend_Form_Element_Select('hijossecundaria');
        $hijossecundaria->setLabel('Hijos en escuela secundaria')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $hijossecundaria->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Ninguno" => "Ninguno",
            "Un hijo" => "Un hijo",
            "Dos o mas" => "Dos o mas"
        ));

        $hijosterciario = new Zend_Form_Element_Select('hijosterciario');
        $hijosterciario->setLabel('Hijos en tericiario o universitario')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $hijosterciario->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Ninguno" => "Ninguno",
            "Un hijo" => "Un hijo",
            "Dos hijos" => "Dos hijos",
            "Tres o mas" => "Tres o mas"
        ));

        $comprobantesimpuestos = new Zend_Form_Element_Select('comprobantesimpuestos');
        $comprobantesimpuestos->setLabel('Comprobantes de impuestos')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $comprobantesimpuestos->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "0" => "0",
            "0 - 150" => "0 - 150",
            "151 - 250" => "151 - 250",
            "251 - 400" => "251 - 400",
            "401 en adelante" => "401 en adelante"
        ));

        $situacionlaboral = new Zend_Form_Element_Select('situacionlaboral');
        $situacionlaboral->setLabel('Situación laboral')->setAttribs(array('class' => 'form-control'))->setRequired();

        $situacionlaboral->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Estable" => "Estable",
            "Medianamente estable" => "Medianamente estable",
            "Inestable" => "Inestable"
        ));

        $saludfamiliar = new Zend_Form_Element_Select('saludfamiliar');
        $saludfamiliar->setLabel('Salud familiar')->setAttribs(array('class' => 'form-control'))
                ->setRequired();

        $saludfamiliar->addMultiOptions(array(
            "? undefined:undefined ?"=>"",
            "Buena" => "Buena",
            "Deficiente" => "Deficiente",
            "Precaria" => "Precaria"
        ));

        $datosFamilia = new Zend_Form_SubForm();
        $datosFamilia->setLegend("Datos de Familia");
        $datosFamilia->addElements(array($obrasocial, $hijosprimaria, $hijossecundaria, $hijosterciario, $comprobantesimpuestos, $situacionlaboral, $saludfamiliar));

        /* CONFIRMACION */
        $submit = new Zend_Form_Element_Submit('Guardar');
        $submit->setAttribs(array('class' => 'btn btn-primary'));

        $this->addSubForms(array('datospersonales' => $datosPers, 'datosdomicilio' => $datosDomicilio, 'datosacademicos' => $datosAcademicos, "datosfamilia" => $datosFamilia));
        $this->addElement($submit);

        $this->setElementDecorators(array(
            'ViewHelper',
            //'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array('ErrorsHtmlTag', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $submit->setDecorators(array('ViewHelper',
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('emptyrow' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $this->setDecorators(
                array(
                    "FormElements",
                    array("HtmlTag", array("tag" => "table")),
                    "Form"
                )
        );
    }

}
