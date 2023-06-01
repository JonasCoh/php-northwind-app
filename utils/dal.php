<?php

class NorthwindDB{

    private $host = "localhost";
    private $username = 'root';
    private $password = '';
    private $db = 'northwind';
    
    public function connect(){  
        
        try {
            return new mysqli( $this->host, $this->username, $this->password, $this->db );
        } catch (\Throwable $th) {
            die( "Connection Error!" );
        }
        
    }

    public function select( $sql ){

        // open a connection to the DB
        $connetion = $this->connect();
        if( !$connetion){
            return;
        }

        // Check connection
        if( $connetion->connect_error ){
            die( "Connection Error: " .  $connetion->connect_error );
            return;
        }
        

        // Query 
        $result = $connetion->query( $sql );
        $data = $result->fetch_all( MYSQLI_ASSOC );

        // close the connection to the DB
        $connetion->close();

        // return the data
        return $data;
    }


    public function execute( $sql ){

        // open a connection to the DB
        $connetion = $this->connect();

        if( !$connetion){
            return;
        }

        // Query 
        $connetion->query( $sql );
        $id = $connetion->insert_id;

        // close the connection to the DB
        $connetion->close();

        // return the inset id
        return $id;

    }

} 
// Singleton
