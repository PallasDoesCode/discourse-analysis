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
     *  @covers RegistrationModuel::InputName
     */
     public function NameTest()
     {

     }

     /**
      * @covers RegistrationModuel::InputUsername
      */
     public function UsernameTest()
     {

     }

     /*
      * @covers RegistrationModuel::InputPassword
      */
     public function PasswordTest()
     {

     }

     /*
      *  @covers RegistrationModuel::InputEmail
      */
    public function EmailTest()
    {

    }

    /**
     *  @covers RegistrationModuel::RequestConfirmation
     */
    public function AccountCreationTest()
    {
        $this->assertRegExp('/asdf/', 'asdf');

        // Step 1. Setup the account info (i.e. username, password, email, and name)
        // Step 2. Somehow call RequestConfirmation passing it these variables. Might need to be done via mocking.
    }

    /**
     *  @covers RegistrationModuel::ConfirmUser
     */

     public function ConfirmAccountCreationTest()
    {
        $this->assertRegExp('/asdf/', 'asdf');

        // Step 1. Somehow get the registration key and pass it to the ConfirmUser function as an argument
        // Step 2.
    }
}
