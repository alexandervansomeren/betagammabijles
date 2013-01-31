<?php
// The ConnectorClass is a class defining an object which holds the key to the MySql database connection through PHP.

class ConnectorClass
{
    private $Connection;                       // String with connection resource.
    private $ConnectionIniObject;              // Object with array of xml containing databaseconnection information.
    private $ConnectionIniArray;               // Array with xml containing databaseconnection information.
    private $databaseserver;                   // String containing databaseserver hostname.
    private $username;                         // String containing database username.
    private $password;                         // String containing database password.
    public $Query;                             // String containing the query. Should become of type private when properly defined.
    private $QueryHandle;                      // String containing the resource of the query.
    public $QueryResult;                       // Array containing the query result.
    
    public function ConnectorClass()           // Main function.
    {
        $this -> VariableDeclaration();
        $this -> Connect();
    }
 
    private function VariableDeclaration()     // Declaration of Variable Types preventing abuse.
    {
        settype( $this -> Connection, "string" );
        settype( $this -> ConnectionIniObject, "object" );
        settype( $this -> ConnectionIniArray, "array" );
        settype( $this -> databaseserver, "string" );
	settype( $this -> databaseName, "string" ); // for PDO, the database name is required
        settype( $this -> username, "string" );
        settype( $this -> password, "string" );
        settype( $this -> Query, "string" );
        settype( $this -> QueryResult, "array" );
        settype( $this -> QueryHandle, "string" );
    }

    private function Connect()                 // Connection preparing function.
    {
                                               // First: Importing the XML file defining specific  databaseconnection information.
        $this -> ConnectionIniObject = simplexml_load_file ( 'shielded/databaseSetup.xml');
                                               // Unpacking the XML Array out of the Object.
        $this -> ConnectionIniArray = (get_object_vars( $this -> ConnectionIniObject )); 
                                               // Sanitize filtering variables.
        $this -> databaseserver = filter_var( $this -> ConnectionIniArray[ "servername" ], FILTER_SANITIZE_URL ) .
                                   ':' . filter_var( $this -> ConnectionIniArray[ "serverport" ], FILTER_SANITIZE_NUMBER_INT );
		$this -> databaseName = filter_var( $this -> ConnectionIniArray["databasename"], FILTER_SANITIZE_STRING );
        $this -> password = filter_var( $this -> ConnectionIniArray["password"], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP );
        $this -> username = filter_var( $this -> ConnectionIniArray["loginname"], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP );
                                               // The database connection grows up here:
        try{ $this -> Connection = mysql_connect( $this -> databaseserver, $this -> username, $this -> password ); }
        catch ( Exeption $e ){ echo('Connection to database failed.'); }
                                               // When using the new style PDO manner isn't errorfree yet,
                                               // So the combination of classes, objects and the old PHP mysql_connect() function is used.

        //{ $databaseConnection = new PDO( "mysql:host=$this -> databaseserver;dbname=databasename; charset=UTF-8", $this -> username, $this -> password );
        // } //catch( PDOExeption $e ){ echo( 'Connection failed: '. $e -> getMessage());    }
      
         return;     
     }
     public function Disconnect()               // Disconnecting connection function.
     {
         try{ mysql_close( $this -> Connection );}
         catch( Exeption $e ) { echo( 'Disconnecting to the database failed.' ); }
     }

     public function Querying()
     {
         $counter = 0; 
         // List of predefined query's should be put here.
         try{ $this -> QueryHandle = mysql_query( $this -> Query, $this -> Connection );    
         while ( $row = mysql_fetch_array( $this -> QueryHandle, MYSQL_BOTH ) ) { $counter++; $this -> QueryResult[$counter]= $row; } 
         return( $this -> QueryResult); } 
         catch( Exeption $e ) { echo( 'Querying failed.' ); }
      }

}
// End of File
?>
