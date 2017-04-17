<?php

namespace My\Entity;
/**
 * @Entity
 */
class Familiar {
    /**
     * @var integer 
     * @Column (type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $idFamiliar;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $nombreF;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $dniF;
    /**
     * 
     * @var integer
     * @Column(type="integer")
     */
    protected $edad;
    /**
     * 
     * @var integer
     * @Column(type="integer")
     */
    protected $ingreso;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $parentesco;
    /**
     * @ManyToOne(targetEntity="Postulante", inversedBy="familiar", cascade={"persist"})
     * @JoinColumn(name="postulante", referencedColumnName="id")
     */
    protected $postulante;
    function __construct() {
        
    }

    function getIdFamiliar() {
        return $this->idFamiliar;
    }

    function getNombreF() {
        return $this->nombreF;
    }

    function getDniF() {
        return $this->dniF;
    }

    function getEdad() {
        return $this->edad;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function getParentesco() {
        return $this->parentesco;
    }

    function getPostulante() {
        return $this->postulante;
    }

    function setIdFamiliar($idFamiliar) {
        $this->idFamiliar = $idFamiliar;
    }

    function setNombreF($nombreF) {
        $this->nombreF = $nombreF;
    }

    function setDniF($dniF) {
        $this->dniF = $dniF;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function setParentesco($parentesco) {
        $this->parentesco = $parentesco;
    }

    function setPostulante($postulante) {
        $this->postulante = $postulante;
    }


}
