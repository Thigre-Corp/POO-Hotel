<?php

    require_once 'Chambre.php';

    class Client {
        //---propriétés
        static int $_id_Hotel = 0;
        protected string $_nomHotel;
        protected int $_nbEtoile;
        protected string $_adresse;
        protected string $_cp;
        protected string $_ville;
        //---constructor
        public function __construct( string $nomHotel, int $nbEtoile, string $adresse, string $cp , string $ville){
            $this->_nomHotel = $nomHotel;
            $this->_nbEtoile = $nbEtoile;
            $this->_adresse = $adresse;
            $this->_cp = $cp;
            $this->_ville = $ville;
            ++self::$_id_Hotel;
        }
        //---toString
        public function __toString(){
            return ($this->_nomHotel+" "+str_repeat("*", $this->_nbEtoile)+" "+$this->_ville);
        }
        //---getters
        public function getNom(){
            return $this->_nomHotel;
        }
        public function getNbEtoile(){
            return $this->_nbEtoile;
        }
        public function getAdresse(){
            return $this->_adresse;
        }
        public function getCp(){
            return $this->_cp;
        }
        public function getVille(){
            return $this->_ville;
        }
        public function getID(){
            return self::$_id_Hotel;
        }
        //---setters
        public function setNom(string $nomHotel){
            $this->_nomHotel = $nomHotel;
        }
        public function setNbEtoile(int  $nbEtoile){
            $this->_nbEtoile = $nbEtoile;
        }
        public function setAdresse(string $adresse){
            $this->_adresse = $adresse;
        }
        public function setCp(string $cp){
            $this->_cp = $cp;
        }
        public function setVille(string $ville){
            $this->_ville = $ville;
        }
    }