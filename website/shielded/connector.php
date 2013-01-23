<?php
// The ConnectorClass is a class defining an object which holds the key to the MySql database connection through PHP.

class ConnectorClass
{
    private $Connection;                       // String with Connectiion Resource.
    private $ConnectionIniObject;              // Object with Array of xml containing databaseconnection information.
    private $ConnectionIniArray;               // Array with xml containing databaseconnection information.
    private $databaseserver;                   // String containing databaseserver hostname.
    private $username;                         // String containing database username.
    private $password;                         // String containing database password.
    public $Query;                             // String containing the Query. Should become of type private when properly defined.

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
        settype( $this -> username, "string" );
        settype( $this -> password, "string" );
        settype( $this -> Query, "string" );
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
        $this -> password = filter_var( $this -> ConnectionIniArray["password"], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP );
        $this -> username = filter_var( $this -> ConnectionIniArray["loginname"], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP );
                                               // The database connection grows up here:
        try{ $this -> Connection = mysql_connect( $this -> databaseserver, $this -> username, $this -> password ); }
        catch ( Exeption $e ){ echo('Connection to database failed.'); }
                                               // When using the new style PDO manner isn't errorfree yet,
                                               // So the combination of classes, objects and the old PHP mysql_connect() function is used.

        //try{ $databaseConnection = new PDO( $this -> databaseserver, $this -> username. $this -> password );
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
         // List of predefined query's should be put here.
         try{ return ( mysql_query( $this -> Query, $this -> Connection ) ); } 
         catch( Exeption $e ) { echo( 'Querying failed.' ); }       
     }

}

// Here the class defined above is used:
$connectionObject = new ConnectorClass;
// Test query's here. Should become a set of predefined query's as part of the function Querying().
$connectionObject -> Query = "SELECT * FROM *;";
echo('Result of the Query ('.$connectionObject -> Query.') :');
var_dump( $connectionObject -> Querying() );
// Disconnecting function directed:
$connectionObject -> Disconnect();
// End of File
