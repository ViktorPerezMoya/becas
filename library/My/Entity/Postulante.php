<?php
namespace My\Entity;

/**
 * @Entity
 */
class Postulante {
    /**
     * @var integer 
     * @Column (type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $nombre;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $apellido;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $dni;
    /**
     * 
     * @var integer
     * @Column(type="integer")
     */
    protected $cuil;
    /**
     *
     * @var date
     * @Column (type="date")
     */
    protected $nacimiento;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $telFijo;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $telCelular;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $email;
    /**
     * 
     * @var integer
     * @Column(type="integer")
     */
    protected $puntajeEntrevista;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $distrito;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $domicilio;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $delegacion;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $propVivienda;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $carrera;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $carreraDireccion;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $nombreCarrera;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $nivelAcademico;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $obraSocial;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $hijosPrimaria;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $hijosSecundaria;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $hijosTerciario;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $comprobantes;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $situacionLaboral;
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $saludFamiliar;
    /**
     * 
     * @var integer
     * @Column(type="integer")
     */
    protected $puntos;
    /**
     * @var Collection
     * @OneToMany(targetEntity="Familiar", mappedBy="postulante", cascade={"persist"}, fetch="EAGER")
     */
    protected $familiares;
    /**
     * 
     * @var integer
     * @Column(type="integer")
     */
    protected $periodo;
    
    function __construct() {
        $this->familiares = new \Doctrine\Common\Collections\ArrayCollection();
        
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDni() {
        return $this->dni;
    }

    function getCuil() {
        return $this->cuil;
    }

    function getNacimiento() {
        return $this->nacimiento;
    }

    function getTelFijo() {
        return $this->telFijo;
    }

    function getTelCelular() {
        return $this->telCelular;
    }

    function getEmail() {
        return $this->email;
    }

    function getPuntajeEntrevista() {
        return $this->puntajeEntrevista;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getDomicilio() {
        return $this->domicilio;
    }

    function getDelegacion() {
        return $this->delegacion;
    }

    function getPropVivienda() {
        return $this->propVivienda;
    }

    function getCarrera() {
        return $this->carrera;
    }

    function getCarreraDireccion() {
        return $this->carreraDireccion;
    }

    function getNombreCarrera() {
        return $this->nombreCarrera;
    }

    function getNivelAcademico() {
        return $this->nivelAcademico;
    }

    function getObraSocial() {
        return $this->obraSocial;
    }

    function getHijosPrimaria() {
        return $this->hijosPrimaria;
    }

    function getHijosSecundaria() {
        return $this->hijosSecundaria;
    }

    function getHijosTerciario() {
        return $this->hijosTerciario;
    }

    function getComprobantes() {
        return $this->comprobantes;
    }

    function getSituacionLaboral() {
        return $this->situacionLaboral;
    }

    function getSaludFamiliar() {
        return $this->saludFamiliar;
    }

    function getPuntos() {
        return $this->puntos;
    }

    function obtenerFamiliares() {
        return $this->familiares;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setCuil($cuil) {
        $this->cuil = $cuil;
    }

    function setNacimiento($nacimiento) {
        $this->nacimiento = \DateTime::createFromFormat('d/m/Y',$nacimiento);
    }

    function setTelFijo($telFijo) {
        $this->telFijo = $telFijo;
    }

    function setTelCelular($telCelular) {
        $this->telCelular = $telCelular;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPuntajeEntrevista($puntajeEntrevista) {
        $this->puntajeEntrevista = $puntajeEntrevista;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }

    function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    function setDelegacion($delegacion) {
        $this->delegacion = $delegacion;
    }

    function setPropVivienda($propVivienda) {
        $this->propVivienda = $propVivienda;
    }

    function setCarrera($carrera) {
        $this->carrera = $carrera;
    }

    function setCarreraDireccion($carreraDireccion) {
        $this->carreraDireccion = $carreraDireccion;
    }

    function setNombreCarrera($nombreCarrera) {
        $this->nombreCarrera = $nombreCarrera;
    }

    function setNivelAcademico($nivelAcademico) {
        $this->nivelAcademico = $nivelAcademico;
    }

    function setObraSocial($obraSocial) {
        $this->obraSocial = $obraSocial;
    }

    function setHijosPrimaria($hijosPrimaria) {
        $this->hijosPrimaria = $hijosPrimaria;
    }

    function setHijosSecundaria($hijosSecundaria) {
        $this->hijosSecundaria = $hijosSecundaria;
    }

    function setHijosTerciario($hijosTerciario) {
        $this->hijosTerciario = $hijosTerciario;
    }

    function setComprobantes($comprobantes) {
        $this->comprobantes = $comprobantes;
    }

    function setSituacionLaboral($situacionLaboral) {
        $this->situacionLaboral = $situacionLaboral;
    }

    function setSaludFamiliar($saludFamiliar) {
        $this->saludFamiliar = $saludFamiliar;
    }

    function setPuntos($puntos) {
        $this->puntos = $puntos;
    }

    function setFamiliares($familiares) {
        $this->familiares = $familiares;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    public function asignarDelegacion() {

        if ($this->getDistrito() === 'El Chilcal' ||
                $this->getDistrito() === 'La Pega' ||
                $this->getDistrito() === 'El Vergel' ||
                $this->getDistrito() === 'Las Violetas' ||
                $this->getDistrito() === 'Jocolí Viejo' ||
                $this->getDistrito() === 'El Paramillo' ||
                $this->getDistrito() === 'La Holanda') {
            $this->setDelegacion('Zona Sur');
        } else if ($this->getDistrito() === 'Tres de Mayo') {
            $this->setDelegacion('Tres de Mayo');
        } else if ($this->getDistrito() === 'Alto del Olvido' ||
                $this->getDistrito() === 'San Francisco' ||
                $this->getDistrito() === 'Colonia Italia' ||
                $this->getDistrito() === 'Oscar Mendoza' ||
                $this->getDistrito() === 'La Palmera') {
            $this->setDelegacion('Alto del Olvido');
        } else if ($this->getDistrito() === 'Jocolí') {
            $this->setDelegacion('Jocolí');
        } else if ($this->getDistrito() === 'Costa de Araujo' ||
                $this->getDistrito() === 'El Carmen' ||
                $this->getDistrito() === 'La Bajada' ||
                $this->getDistrito() === 'El Plumero') {
            $this->setDelegacion('Costa de araujo');
        } else if ($this->getDistrito() === 'Gustavo Andre') {
            $this->setDelegacion('Gustavo Andre');
        } else if ($this->getDistrito() === 'La Asunción' ||
                $this->getDistrito() === 'Lagunas del Rosario' ||
                $this->getDistrito() === 'San Miguel' ||
                $this->getDistrito() === 'San Jose') {
            $this->setDelegacion('Zonas no Irrigadas');
        } else if ($this->getDistrito() === 'Villa Tulumaya') {
            $this->setDelegacion('Villa Tulumaya');
        }
    }

    public function calcularPuntos() {
        $this->calcPuntosSocioEcon();
        $this->calcNivelAcademico();
        $this->calcPuntosEntrevista();
        $this->calcPuntosCarrera();
    }

    private function calcPuntosSocioEcon() {

        $puntosSocioEcon = 0;
        /* PUNTOS POR DOMICILIO */
        switch ($this->getDistrito()) {

            case 'Villa Tulumaya':
                $puntosSocioEcon = $puntosSocioEcon + 1;
                break;
            case 'Jocolí Viejo':
                $puntosSocioEcon = $puntosSocioEcon + 2;
                break;
            case 'Jocolí':
                $puntosSocioEcon = $puntosSocioEcon + 6;
                break;
            case 'La Bajada':
                $puntosSocioEcon = $puntosSocioEcon + 3;
                break;
            case 'El Carmen':
                $puntosSocioEcon = $puntosSocioEcon + 8;
                break;
            case 'El Chilcal':
                $puntosSocioEcon = $puntosSocioEcon + 5;
                break;
            case 'La Asunción':
                $puntosSocioEcon = $puntosSocioEcon + 10;
                break;
            case 'La Pega':
                $puntosSocioEcon = $puntosSocioEcon + 5;
                break;
            case 'La Palmera':
                $puntosSocioEcon = $puntosSocioEcon + 8;
                break;
            case 'La Holanda':
                $puntosSocioEcon = $puntosSocioEcon + 7;
                break;
            case 'Lagunas del Rosario':
                $puntosSocioEcon = $puntosSocioEcon + 10;
                break;

            case 'Alto del Olvido':
                $puntosSocioEcon = $puntosSocioEcon + 8;
                break;
            case 'Las Violetas':
                $puntosSocioEcon = $puntosSocioEcon + 9;
                break;
            case 'Colonia Italia':
                $puntosSocioEcon = $puntosSocioEcon + 8;
                break;
            case 'Costa de Araujo':
                $puntosSocioEcon = $puntosSocioEcon + 3;
                break;
            case 'Tres de Mayo':
                $puntosSocioEcon = $puntosSocioEcon + 4;
                break;
            case 'Gustavo André':
                $puntosSocioEcon = $puntosSocioEcon + 8;
                break;
            case 'El Vergel':
                $puntosSocioEcon = $puntosSocioEcon + 7;
                break;
            case 'El Paramillo':
                $puntosSocioEcon = $puntosSocioEcon + 7;
                break;
            case 'Oscar Mendoza':
                $puntosSocioEcon = $puntosSocioEcon + 9;
                break;
            case 'San Francisco':
                $puntosSocioEcon = $puntosSocioEcon + 8;
                break;
            case 'San Jose':
                $puntosSocioEcon = $puntosSocioEcon + 10;
                break;
            case 'El Plumero':
                $puntosSocioEcon = $puntosSocioEcon + 8;
                break;
            case 'San Miguel':
                $puntosSocioEcon = $puntosSocioEcon + 10;
                break;
        }

        /* POR DOMICILIO CARRERA */

        switch ($this->getCarreraDireccion()) {
            case 'Lavalle':
                $puntosSocioEcon = $puntosSocioEcon + 1;
                break;
            case 'Ciudad':
                $puntosSocioEcon = $puntosSocioEcon + 3;
                break;
            case 'U.N.C / Godoy Cruz':
                $puntosSocioEcon = $puntosSocioEcon + 7;
                break;
            case 'Rodeo del Medio / Lujan de Cuyo':
                $puntosSocioEcon = $puntosSocioEcon + 10;
        }

        /* POR HIJOS */

        switch ($this->getHijosPrimaria()) {
            case 'Ninguno':
                $puntosSocioEcon = $puntosSocioEcon + 0;
                break;
            case 'Uno o mas':
                $puntosSocioEcon = $puntosSocioEcon + 3;
        }

        switch ($this->getHijosSecundaria()) {
            case 'Ninguno':
                $puntosSocioEcon = $puntosSocioEcon + 0;
                break;
            case 'Un hijo':
                $puntosSocioEcon = $puntosSocioEcon + 3;
                break;
            case 'Dos o mas':
                $puntosSocioEcon = $puntosSocioEcon + 5;
                break;
        }

        switch ($this->getHijosTerciario()) {
            case 'Ninguno':
                $puntosSocioEcon = $puntosSocioEcon + 0;
                break;
            case 'Un hijo':
                $puntosSocioEcon = $puntosSocioEcon + 5;
                break;
            case 'Dos hijos':
                $puntosSocioEcon = $puntosSocioEcon + 7;
                break;
            case 'Tres o mas':
                $puntosSocioEcon = $puntosSocioEcon + 10;
        }


        /* POR SALUD FAMILIAR */

        switch ($this->getSaludFamiliar()) {
            case 'Buena':
                $puntosSocioEcon = $puntosSocioEcon + 0;
                break;
            case 'Deficiente':
                $puntosSocioEcon = $puntosSocioEcon + 5;
                break;
            case 'Precaria':
                $puntosSocioEcon = $puntosSocioEcon + 10;
                break;
        }

        /* POR SITUACION LABORAL */

        switch ($this->getSituacionLaboral()) {
            case 'Estable':
                $puntosSocioEcon = $puntosSocioEcon + 0;
                break;
            case 'Medianamente estable':
                $puntosSocioEcon = $puntosSocioEcon + 5;
                break;
            case 'Inestable':
                $puntosSocioEcon = $puntosSocioEcon + 10;
                break;
        }

        /* POR OBRA SOCIAL */

        switch ($this->getObraSocial()) {
            case 'Toda La Familia':
                $puntosSocioEcon = $puntosSocioEcon + 0;
                break;
            case 'Algunos Integrantes':
                $puntosSocioEcon = $puntosSocioEcon + 5;
                break;
            case 'Ninguna':
                $puntosSocioEcon = $puntosSocioEcon + 10;
                break;
        }

        /* POR TITULAR VIVIENDA */

        switch ($this->getPropVivienda()) {
            case 'Propia':
                $puntosSocioEcon = $puntosSocioEcon + 0;
                break;
            case 'Propia con deuda':
                $puntosSocioEcon = $puntosSocioEcon + 4;
                break;
            case 'Prestada/Cedida':
                $puntosSocioEcon = $puntosSocioEcon + 6;
                break;
            case 'Ubicada en terrenos fiscales / usurpada':
                $puntosSocioEcon = $puntosSocioEcon + 8;
                break;
            case 'Alquilada':
                $puntosSocioEcon = $puntosSocioEcon + 10;
                break;
        }

        /* POR IMPUESTOS */

        switch ($this->getComprobantes()) {
            case '0':
                $puntosSocioEcon = $puntosSocioEcon + 0;
                break;
            case '0 - 150':
                $puntosSocioEcon = $puntosSocioEcon + 3;
                break;
            case '151 - 250':
                $puntosSocioEcon = $puntosSocioEcon + 6;
                break;
            case '251 - 400':
                $puntosSocioEcon = $puntosSocioEcon + 8;
                break;
            case '401 en adelante':
                $puntosSocioEcon = $puntosSocioEcon + 10;
                break;
        }

        /* POR INGRESOS FAMILIARES */
        $ingresosFamiliares = 0;
        if (count($this->obtenerFamiliares()) > 0) {
            foreach ($this->obtenerFamiliares() as $familiar) {
                $ingresosFamiliares = $ingresosFamiliares + $familiar['ingreso'];
            }
            var_dump($ingresosFamiliares);
            if ($ingresosFamiliares <= 3000) {
                $puntosSocioEcon = $puntosSocioEcon + 10;
            } else if ($ingresosFamiliares <= 3600) {
                $puntosSocioEcon = $puntosSocioEcon + 9;
            } else if ($ingresosFamiliares <= 4000) {
                $puntosSocioEcon = $puntosSocioEcon + 8;
            } else if ($ingresosFamiliares <= 4600) {
                $puntosSocioEcon = $puntosSocioEcon + 6;
            } else if ($ingresosFamiliares <= 5000) {
                $puntosSocioEcon = $puntosSocioEcon + 3;
            } else if ($ingresosFamiliares <= 8000) {
                $puntosSocioEcon = $puntosSocioEcon + 2;
            } else if ($ingresosFamiliares <= 10000) {
                $puntosSocioEcon = $puntosSocioEcon + 1;
            }  
        }

        $this->setPuntos($this->getPuntos() + ($puntosSocioEcon * 65));
    }

    private function calcNivelAcademico() {
        /* POR NIVEL ACADEMICO */
        $puntosNivelAcademico = 0;
        switch ($this->getNivelAcademico()) {
            case '9 o más':
                $puntosNivelAcademico = $puntosNivelAcademico + 10;
                break;
            case '8,99 a 8':
                $puntosNivelAcademico = $puntosNivelAcademico + 7;
                break;
            case '7,99 a 7':
                $puntosNivelAcademico = $puntosNivelAcademico + 5;
                break;
            case '6,99 a 6':
                $puntosNivelAcademico = $puntosNivelAcademico + 3;
                break;
            case '5,99 o menos':
                $puntosNivelAcademico = $puntosNivelAcademico + 0;
                break;
        }
        $this->setPuntos($this->getPuntos() + $puntosNivelAcademico * 20);
    }

    private function calcPuntosEntrevista() {
        $this->setPuntos($this->getPuntos() + $this->getPuntajeEntrevista() * 5);
    }

    private function calcPuntosCarrera() {
        /* POR CARRERA */
        $puntosCarrera = 0;
        switch ($this->getCarrera()) {
            case '(DE GRADO)Orientadas a las Ingenierias':
                $puntosCarrera = $puntosCarrera + 10;
                break;
            case '(DE GRADO)Orientadas a las Ciencias de la Salud':
                $puntosCarrera = $puntosCarrera + 9;
                break;
            case '(DE GRADO)Orientadas a las Ciencias Económicas':
                $puntosCarrera = $puntosCarrera + 8;
                break;
            case '(DE GRADO)Orientadas a las Ciencias de la Educación':
                $puntosCarrera = $puntosCarrera + 7;
                break;
            case '(DE GRADO)Orientadas a las Ciencias Sociales y Humanas':
                $puntosCarrera = $puntosCarrera + 6;
                break;
            case '(TECNICATURAS)Orientadas a la producion agraria y/o alimentaria':
                $puntosCarrera = $puntosCarrera + 5;
                break;
            case '(TECNICATURAS)Orientadas a las Ciencias de la Salud':
                $puntosCarrera = $puntosCarrera + 4;
                break;
            case '(TECNICATURAS)Orientadas a las Ciencias Economicas':
                $puntosCarrera = $puntosCarrera + 3;
                break;
            case '(TECNICATURAS)Orientadas a las Ciencias de la Educacion':
                $puntosCarrera = $puntosCarrera + 2;
                break;
            case '(TECNICATURAS)Orientadas a las Sociales y Humanas':
                $puntosCarrera = $puntosCarrera + 1;
                break;
        }
        $this->setPuntos($this->getPuntos() + $puntosCarrera * 10);
    }

}
