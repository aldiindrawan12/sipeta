<?php 
 class  MY_Logger  { 

    protected  $logger ; 

    protected  $hostname ;

    public  function  __construct () 

    { 

        $this->hostname  =  php_uname ( "n" ); 

        $config  =  realpath ( __DIR__  .  "/../config/log4php.php" ); 

        Logger :: configure ( $config ); 

        $this->logger  =  Logger :: getLogger ( "main" ); 

    }


    public  function  fatal ( $message ,  $throwable  =  null ) 

    { 

        $this->logger->fatal ( $this->format ( $message ),  $throwable ); 

    }


    public  function  error ( $message ,  $throwable  =  null ) 

    { 

        $this->logger->error ( $this->format ( $message ),  $throwable ); 

    }


    public  function  warn ( $message ,  $throwable  =  null ) 

    { 

        $this->logger->warn ( $this->format ( $message ),  $throwable ); 

    }


    public  function  info ( $message ,  $throwable  =  null ) 

    { 

        $this->logger->info ( $this->format ( $message ),  $throwable ); 

    }


    public  function  debug ( $message ,  $throwable  =  null ) 

    { 

        $this->logger->debug ( $this->format ( $message ),  $throwable ); 

    }


    public  function  trace ( $message ,  $throwable  =  null ) 

    { 

        $this->logger->trace ( $this->format ( $message ),  $throwable ); 

    }


    protected  function  format ( $message ) 

    { 

        return  $_SERVER['REMOTE_ADDR'] ." ". $this->hostname  .  ' " '  .  $message .' "'; 

    } 
 }
 