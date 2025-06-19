<?php

    class Chambre {
        //---propriétés
        static int $_id_Chambre = 0;
        private int $_numChambre;
        private int $_nbLits;
        private bool $_possedeWifi;
        private float $_tarif;
        private Hotel $_hotel;
        private bool $_estDisponible = true;
        //---constructor
        public function __construct( int $numChambre, int $nbLits, bool $possedeWifi, float $tarif , Hotel $hotel){
            $this->_numChambre = $numChambre;
            $this->_nbLits = $nbLits;
            $this->_possedeWifi = $possedeWifi;
            $this->_tarif = $tarif;
            $this->_hotel = $hotel;
            //$this->_estDisponible = true;
            $hotel->setChambre($this);
            ++self::$_id_Chambre;
        }
        //---toString
        public function __toString(){
            return ("Chambre : ".$this->_numChambre." (".$this->_nbLits." lits - ".$this->_tarif." € - Wifi : ".($this->_possedeWifi ? "oui)": "non)")); 
        }
        //---getters
        public function getNumChambre(){
            return $this->_numChambre;
        }
        public function getNbLits(){
            return $this->_nbLits;
        }
        public function getPossedeWifi(){
            return $this->_possedeWifi;
        }
        public function getTarif(){
            return $this->_tarif;
        }
        public function getID(){
            return self::$_id_Chambre;
        }
        public function getHotel() : Hotel {
            return $this->_hotel;
        }
        public function getDisponible(){
            return $this->_estDisponible;
        }
        //---setters
        public function setNumChambre(int $numChambre){
            $this->_numChambre = $numChambre;
        }
        public function setNbLits(int  $nbLits){
            $this->_nbLits = $nbLits;
        }
        public function setPossedeWifi(bool $possedeWifi){
            $this->_possedeWifi = $possedeWifi;
        }
        public function setTarif(float $tarif){
            $this->_tarif = $tarif;
        }
        public function setHotel(Hotel $Hotel){
            $this->_hotel = $hotel;
        }
        public function setDisponible(bool $estDisponible){
            $this->_estDisponible = $estDisponible;
        }
    }