<?php

    class Client {
        //---propriétés
        static int $_id_Client = 0;
        protected string $_nomClient;
        protected string $_prenomClient;
        //---constructor
        public function __construct(string $nomClient, string $prenomClient){
            $this->_nomClient = $nomClient;
            $this->_prenomClient = $prenomClient;
            ++self::$_id_Client;
        }
        //---toString
        public function __toString(){
            return ($this->_nomClient+" "+$this->_prenomClient);
        }
        //---getters
        public function getNom(){
            return $this->_nomClient;
        }
        public function getPrenom(){
            return $this->_prenomClient;
        }
        public function getID(){
            return self::$_id_Client;
        }
        //---setters
        public function setNom(string $nomClient){
            $this->_nomClient = $nomClient;
        }
        public function setPrenom(string $prenomClient){
            $this->_prenomClient = $prenomClient;
        }
    }


