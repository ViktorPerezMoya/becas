<?php

class Default_PostulanteController extends Zend_Controller_Action {

    /**
     * Redirector - defined for code completion
     *
     * @var Zend_Controller_Action_Helper_Redirector
     */
    protected $_redirector = null;

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $_em = null;

    public function init() {
        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('layout');

        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();

        $this->_redirector = $this->_helper->getHelper('Redirector');
    }

    public function indexAction() {
        $query = $this->_em->createQuery("SELECT p FROM My\Entity\Postulante p WHERE p.periodo = ?1 ORDER BY p.puntos DESC");
        $query->setParameter(1, date('Y'));
        $postulantes = $query->getResult();
        $this->view->postulantes = $postulantes;
    }

    function imprimirListadoAction() {

        $this->view->headTitle('Listado de Postulantes');
        $this->_helper->layout()->disableLayout();


        $query = $this->_em->createQuery("SELECT p FROM My\Entity\Postulante p WHERE p.periodo = ?1 ORDER BY p.puntos DESC");
        $query->setParameter(1, date('Y'));
        $postulantes = $query->getResult();



        $pdf = new TCPDF_Application_Resource_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();


        // Set some content to print
        $html = '<table border="0" cellspacing="3" cellpadding="4">'
                . '<thead>'
                . '<tr>'
                . '<th>Nombre</th>'
                . '<th>Carrera</th>'
                . '<th>Delegación</th>'
                . '<th>Puntos</th>'
                . '</tr>'
                . '</thead>'
                . '<tbody>';
        $p = new My\Entity\Postulante();
        foreach ($postulantes as $p) {
            $html .= '<tr>'
                    . '<td>' . $p->getNombre() . '</td>'
                    . '<td>' . $p->getNombreCarrera() . '</td>'
                    . '<td>' . $p->getDelegacion() . '</td>'
                    . '<td>' . $p->getPuntos() . '</td>'
                    . '</tr>';
        }

        $html .= '</tbody></table>';

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('listado_de_postulantes' . date('Y') . '.pdf', 'I');
    }

    public function nuevoPostulanteAction() {
        $form = new Default_Form_PostulanteForm();


        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $this->_em->getConnection()->beginTransaction();
                try {
                    $form1 = $form->getSubForm('datospersonales');

                    //var_dump($form1);
                    //var_dump($form1->getValue());die();

                    $postulante = new My\Entity\Postulante();
                    $postulante->setNombre($form1->getElement('nombre')->getValue());
                    $postulante->setApellido($form1->getElement('apellido')->getValue());
                    $postulante->setDni($form1->getElement('dni')->getValue());
                    $postulante->setCuil($form1->getElement('cuil')->getValue());

                    $postulante->setNacimiento($form1->getElement('fechanacimiento')->getValue());
                    $postulante->setTelFijo($form1->getElement('telefono')->getValue());
                    $postulante->setTelCelular($form1->getElement('celular')->getValue());
                    $postulante->setEmail($form1->getElement('email')->getValue());
                    $postulante->setPuntajeEntrevista($form1->getElement('puntajeentrevista')->getValue());

                    $form2 = $form->getSubForm('datosdomicilio');

                    $postulante->setDistrito($form2->getElement('distrito')->getValue());
                    $postulante->asignarDelegacion();
                    $postulante->setDomicilio($form2->getElement('domicilio')->getValue());
                    $postulante->setPropVivienda($form2->getElement('propiedadvivienda')->getValue());

                    $form3 = $form->getSubForm('datosacademicos');

                    $postulante->setCarrera($form3->getElement('carrera')->getValue());
                    $postulante->setNombreCarrera($form3->getElement('nombrecarrera')->getValue());
                    $postulante->setCarreraDireccion($form3->getElement('direccioncarrera')->getValue());
                    $postulante->setNivelAcademico($form3->getElement('nivelacademico')->getValue());

                    $form4 = $form->getSubForm('datosfamilia');

                    $postulante->setObraSocial($form4->getElement('obrasocial')->getValue());
                    $postulante->setHijosPrimaria($form4->getElement('hijosprimaria')->getValue());
                    $postulante->setHijosSecundaria($form4->getElement('hijossecundaria')->getValue());
                    $postulante->setHijosTerciario($form4->getElement('hijosterciario')->getValue());
                    $postulante->setComprobantes($form4->getElement('comprobantesimpuestos')->getValue());
                    $postulante->setSituacionLaboral($form4->getElement('situacionlaboral')->getValue());
                    $postulante->setSaludFamiliar($form4->getElement('saludfamiliar')->getValue());
                    $postulante->setPeriodo(date('Y'));
                    $postulante->setPuntos(0);
                    $postulante->calcularPuntos();

                    $this->_em->merge($postulante);
                    $this->_em->flush();
                    $this->_em->getConnection()->commit();

                    $this->_helper->redirector('index');
                } catch (Exception $ex) {
                    $this->_em->getConnection()->rollback();
                    $this->_em->close();
                    var_dump($ex);
                    die();
                }
            }
        }
    }

    public function verPostulanteAction() {
        $idPostulante = $this->getParam('idpostulante');
        $postulante = $this->_em->find('My\Entity\Postulante', $idPostulante);
        $this->view->postulante = $postulante;
    }

    public function editarAction() {
        $id = $this->getParam('idpostulante');
        $postulante = $this->_em->find('My\Entity\Postulante', $id);

        $form = new Default_Form_PostulanteForm();

        $form->getSubForm('datospersonales')->getElement('nombre')->setValue($postulante->getNombre());
        $form->getSubForm('datospersonales')->getElement('apellido')->setValue($postulante->getApellido());
        $form->getSubForm('datospersonales')->getElement('dni')->setValue($postulante->getDni());
        $form->getSubForm('datospersonales')->getElement('cuil')->setValue($postulante->getCuil());
        $form->getSubForm('datospersonales')->getElement('fechanacimiento')->setValue(date_format($postulante->getNacimiento(), 'd/m/Y'));
        $form->getSubForm('datospersonales')->getElement('telefono')->setValue($postulante->getTelFijo());
        $form->getSubForm('datospersonales')->getElement('celular')->setValue($postulante->getTelCelular());
        $form->getSubForm('datospersonales')->getElement('email')->setValue($postulante->getEmail());
        $form->getSubForm('datospersonales')->getElement('puntajeentrevista')->setValue($postulante->getPuntajeEntrevista());

        $form->getSubForm('datosdomicilio')->getElement('distrito')->setValue($postulante->getDistrito());
        $form->getSubForm('datosdomicilio')->getElement('domicilio')->setValue($postulante->getDomicilio());
        $form->getSubForm('datosdomicilio')->getElement('propiedadvivienda')->setValue($postulante->getPropVivienda());

        $form->getSubForm('datosacademicos')->getElement('carrera')->setValue($postulante->getCarrera());
        $form->getSubForm('datosacademicos')->getElement('nombrecarrera')->setValue($postulante->getNombreCarrera());
        $form->getSubForm('datosacademicos')->getElement('direccioncarrera')->setValue($postulante->getCarreraDireccion());
        $form->getSubForm('datosacademicos')->getElement('nivelacademico')->setValue($postulante->getNivelAcademico());

        $form->getSubForm('datosfamilia')->getElement('obrasocial')->setValue($postulante->getObraSocial());
        $form->getSubForm('datosfamilia')->getElement('hijosprimaria')->setValue($postulante->getHijosPrimaria());
        $form->getSubForm('datosfamilia')->getElement('hijossecundaria')->setValue($postulante->getHijosSecundaria());
        $form->getSubForm('datosfamilia')->getElement('hijosterciario')->setValue($postulante->getHijosTerciario());
        $form->getSubForm('datosfamilia')->getElement('comprobantesimpuestos')->setValue($postulante->getComprobantes());
        $form->getSubForm('datosfamilia')->getElement('situacionlaboral')->setValue($postulante->getSituacionLaboral());
        $form->getSubForm('datosfamilia')->getElement('saludfamiliar')->setValue($postulante->getSaludFamiliar());

        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $this->_em->getConnection()->beginTransaction();
                try {
                    $form1 = $form->getSubForm('datospersonales');

                    //var_dump($form1);
                    //var_dump($form1->getValue());die();

                    $postulante->setNombre($form1->getElement('nombre')->getValue());
                    $postulante->setApellido($form1->getElement('apellido')->getValue());
                    $postulante->setDni($form1->getElement('dni')->getValue());
                    $postulante->setCuil($form1->getElement('cuil')->getValue());

                    $postulante->setNacimiento($form1->getElement('fechanacimiento')->getValue());
                    $postulante->setTelFijo($form1->getElement('telefono')->getValue());
                    $postulante->setTelCelular($form1->getElement('celular')->getValue());
                    $postulante->setEmail($form1->getElement('email')->getValue());
                    $postulante->setPuntajeEntrevista($form1->getElement('puntajeentrevista')->getValue());

                    $form2 = $form->getSubForm('datosdomicilio');

                    $postulante->setDistrito($form2->getElement('distrito')->getValue());
                    $postulante->asignarDelegacion();
                    $postulante->setDomicilio($form2->getElement('domicilio')->getValue());
                    $postulante->setPropVivienda($form2->getElement('propiedadvivienda')->getValue());

                    $form3 = $form->getSubForm('datosacademicos');

                    $postulante->setCarrera($form3->getElement('carrera')->getValue());
                    $postulante->setNombreCarrera($form3->getElement('nombrecarrera')->getValue());
                    $postulante->setCarreraDireccion($form3->getElement('direccioncarrera')->getValue());
                    $postulante->setNivelAcademico($form3->getElement('nivelacademico')->getValue());

                    $form4 = $form->getSubForm('datosfamilia');

                    $postulante->setObraSocial($form4->getElement('obrasocial')->getValue());
                    $postulante->setHijosPrimaria($form4->getElement('hijosprimaria')->getValue());
                    $postulante->setHijosSecundaria($form4->getElement('hijossecundaria')->getValue());
                    $postulante->setHijosTerciario($form4->getElement('hijosterciario')->getValue());
                    $postulante->setComprobantes($form4->getElement('comprobantesimpuestos')->getValue());
                    $postulante->setSituacionLaboral($form4->getElement('situacionlaboral')->getValue());
                    $postulante->setSaludFamiliar($form4->getElement('saludfamiliar')->getValue());
                    $postulante->setPeriodo(date('Y'));
                    $postulante->setPuntos(0);
                    $postulante->calcularPuntos();

                    $this->_em->merge($postulante);
                    $this->_em->flush();
                    $this->_em->getConnection()->commit();

                    $this->getRequest()->clearParams();
                    $this->_helper->redirector('index');
                } catch (Exception $ex) {
                    $this->_em->getConnection()->rollback();
                    $this->_em->close();
                    var_dump($ex);
                    die();
                }
            }
        }
    }

    function familiaresAction() {
        $id = $this->getParam('id');
        $postulante = $this->_em->find('My\Entity\Postulante', $id);
        $this->view->postulante = $postulante;
    }

    function nuevoFamiliarAction() {
        $idpostulante = $this->getParam('idpostulante');
        $postulante = $this->_em->find('My\Entity\Postulante', $idpostulante);

        $form = new Default_Form_FamiliarForm();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $this->_em->getConnection()->beginTransaction();
                try {
                    $f = new My\Entity\Familiar();
                    $f->setNombreF($form->nombre->getValue());
                    $f->setDniF($form->dni->getValue());
                    $f->setEdad($form->edad->getValue());
                    $f->setIngreso($form->ingreso->getValue());
                    $f->setParentesco($form->parentesco->getValue());
                    $f->setPostulante($postulante);


                    $postulante->setPuntos(0);
                    $postulante->calcularPuntos();

                    $this->_em->merge($f);
                    $this->_em->merge($postulante);
                    $this->_em->flush();
                    $this->_em->getConnection()->commit();

                    $this->getRequest()->clearParams();
                    $this->_helper->redirector('familiares', 'postulante', 'default', array('id' => $idpostulante));
                } catch (Exception $ex) {
                    $this->_em->getConnection()->rollback();
                    $this->_em->close();
                    var_dump($ex);
                    die();
                }
            }
        }
    }

    public function borrarFamiliarAction() {
        $idfamiliar = $this->getParam('idfamiliar');
        $idpostulante = $this->getParam('idpostulante');

        $f = $this->_em->find('My\Entity\Familiar',$idfamiliar);
        $this->_em->remove($f);
        $this->_em->flush();
        $this->_em->getConnection()->commit();

        $this->_helper->redirector('familiares', 'postulante', 'default', array('id' => $idpostulante));
    }

}
