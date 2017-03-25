<?php
class My_Controller_Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract {
    
    private $_acl = null;
    
    public function __construct(Zend_Acl $acl) {
        $this->_acl = $acl;
    }
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        $module = $request->getModuleName();
        $resource = $request->getControllerName();
        $action = $request->getActionName();
        if(!$this->_acl->isAllowed(Zend_Registry::get('rol'), $module.':'.$resource,$action)){
            //echo $module.':'.$resource,$action;
            if(!Zend_Auth::getInstance()->hasIdentity()){
            $request->setModuleName('administracion')
                    ->setControllerName('index')
                    ->setActionName('index');
            }else{
            throw new Exception('No tienes permisos para acceder a este página');
            }
        }
        
    }
}
