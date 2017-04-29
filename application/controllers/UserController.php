<?php
class UserController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $user = new Application_Model_UserMapper();
        $this->view->entries = $user->fetchAll();
    }

	public function signAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_User();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $user = new Application_Model_User($form->getValues());
                $mapper  = new Application_Model_UserMapper();
                $mapper->save($user);
                return $this->_helper->redirector('index');
            }
        }
 
        $this->view->form = $form;
    }
}
?>
