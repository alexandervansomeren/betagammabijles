<?php
class ConnectorClass
{
   private $Connection;
   private $ConnectionIniObject;

   public function ConnectorClass() {
      echo('connector');
      $this -> Connect();
      echo($this -> Connection);
    }
 
  private function Connect() {
      $this -> Connection  = 'Test';
      echo(' test ');
      $this -> ConnectionIniObject = simplexml_load_file ( 'shielded/databaseSetup.xml');
     return;
   }
}
$connectionObject = new ConnectorClass;

?>

