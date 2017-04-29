<?php
class Application_Form_User extends Zend_Form
{
    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add the name element
        $this->addElement('text', 'name', array(
            'label'      => 'Full name:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 50))
                )
        ));

        // Add the nickname element
        $this->addElement('text', 'nickname', array(
            'label'      => 'Nickname:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 50))
                )
        ));

        // Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
            'EmailAddress',
            )
        ));

		$this->addElement('password', 'passwordencrypt', array(
			'label'      => 'Password:',
			'required'   => true
		));

		$this->addElement('password', 'verifypassword', array(
			'label'      => 'Verify Password:',
			'required'   => true,
			'validators' => array(
				array('identical', true, array('passwordencrypt'))
			)
		)); 

        $this->addElement('text', 'birthdate', array(
            'label'      => 'Birthdate:',
            'validators'  => array (
                            new Zend_Validate_Date(array('format' => 'MM/dd/yyyy'))
                         ),
            'required'   => true,
        ));
 
        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Sign Guestbook',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}
?>
