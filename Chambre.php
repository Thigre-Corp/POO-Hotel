<?php

    require_once 'Hotel.php';

    // ou class Chambre extend Hotel...serait-ce plus pertinent ?

    class Chambre {
        //---propriétés
        static int $_id_Chambre = 0;
        protected int $_numChambre;
        protected int $_nbLits;
        protected bool $_possedeWifi;
        protected float $_tarif;
        protected int $_id_Hotel; //prendre juste l'ID de l'hotel (moins de données dupliquées) ou prendre tout de l'hotel (récupérer ses méthodes ??)
        //---constructor
        public function __construct( int $numChambre, int $nbLits, bool $possedeWifi, float $tarif , Hotel $hotel){
            $this->_numChambre = $numChambre;
            $this->_nbLits = $nbLits;
            $this->_possedeWifi = $possedeWifi;
            $this->_tarif = $tarif;
            $this->_id_Hotel = $hotel.getID();
            ++self::$_id_Chambre;
        }
        //---toString
        public function __toString(){
            return ("Chambre "+$this->_numChambre+" "+$this->_id_Hotel); // si extends, accès au parent.
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
        public function getHotelID(){
            return $this->_id_Hotel;
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
    }