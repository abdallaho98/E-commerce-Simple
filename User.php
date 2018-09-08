<?php
class User
{
  public $user;
  private $email;
  private $password;
  public function __set($name, $value)
      {
          $this->$name = $value;
      }

  public function __get($name)
      {
          if (property_exists($this,$name)) {
              return $this->$name;
          }

          $trace = debug_backtrace();
          trigger_error(
              'Undefined property via __get(): ' . $name .
              ' in ' . $trace[0]['file'] .
              ' on line ' . $trace[0]['line'],
              E_USER_NOTICE);
          return null;
      }
  public function __construct($user = "",$email = "",$password ="")
      {
       $this->user = $user;
       $this->email = $email;
       $this->password = $password;
      }
}



?>
