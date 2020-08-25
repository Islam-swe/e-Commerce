<?php 


class MySql 

{
  private $serverName;
  private $dbUserName;
  private $dbPassword;
  private $dbName;

  protected function connect()
  {
      $this->serverName ='localhost';
      $this->dbUserName ='root';
      $this->dbPassword ='';
      $this->dbName ='assignment4';
  
     return new mysqli($this->serverName,$this->dbUserName,$this->dbPassword,$this->dbName);

  }

  

}


?>