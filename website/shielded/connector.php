<?php
class ConnectorClass
{
   private $Connection;
   private $ConnectionIniObject;
   private $ConnectionIniArray;
   private $databaseserver;
   private $username;
   private $password;
   private $ConnectionHandle;

   public function ConnectorClass() {
      echo('connector');
      $this -> Connect();
      echo($this -> Connection);
    }
 
  private function Connect() {
      $this -> Connection  = 'Test';
      echo(' test ');
      $this -> ConnectionIniObject = simplexml_load_file ( 'shielded/databaseSetup.xml');
      var_dump( $this -> ConnectionIniObject );
      $this -> ConnectionIniArray = (get_object_vars( $this -> ConnectionIniObject )); 
      $this -> databaseserver = 'mysql:dbname=' . filter_var( $this -> ConnectionIniArray[ "databasename" ], FILTER_SANITIZE_STRIPPED ) . ';host=' . filter_var( $this -> ConnectionIniArray[ "servername" ], FILTER_SANITIZE_URL ) . ':' . filter_var( $this -> ConnectionIniArray[ "serverport" ], FILTER_SANITIZE_NUMBER_INT ); 
      echo( $this -> databaseserver );
      $this -> password = filter_var( $this -> ConnectionIniArray["password"], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP );
      $this -> username = filter_var( $this -> ConnectionIniArray["loginname"], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP );

      try{ $databaseConnection = new PDO( $this -> databaseserver, $this -> username. $this -> password );
      } catch( PDOExeption $e ){ echo( 'Connection failed: '. $e -> getMessage());    }
      return;     
   }
}
$connectionObject = new ConnectorClass;
