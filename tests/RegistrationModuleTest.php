<?php

/**
 *  @coversDefaultClass RegistrationModule
 */
class RegistrationModuleTest extends PHPUnit_Framework_TestCase
{
    protected $registration;

    protected function setUp()
    {
        // RegistrationModule takes in an argument of DatabaseModule
        // registration = new RegistrationModule();
    }

    /**
     *  @covers RegistrationModule::InputName
     */
     public function NameTest()
     {

     }

     /**
      * @covers RegistrationModule::InputUsername
      */
     public function UsernameTest()
     {

     }

     /*
      * @covers RegistrationModule::InputPassword
      */
     public function PasswordTest()
     {

     }

     /*
      *  @covers RegistrationModule::InputEmail
      */
    public function EmailTest()
    {

    }

    /**
     *  @covers RegistrationModule::RequestConfirmation
     */
    public function AccountCreationTest()
    {
        $this->assertRegExp('/asdf/', 'asdf');

        // Step 1. Setup the account info (i.e. username, password, email, and name)
        // Step 2. Somehow call RequestConfirmation passing it these variables. Might need to be done via mocking.
    }

    /**
     *  @covers RegistrationModule::ConfirmUser
     */

     public function ConfirmAccountCreationTest()
    {
        $this->assertRegExp('/asdf/', 'asdf');

        // Step 1. Somehow get the registration key and pass it to the ConfirmUser function as an argument
        // Step 2.
    }
}
