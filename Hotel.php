<?php

    //require_once 'Chambre.php';

    class Hotel {
        //---propriétés
        static int $_id_Hotel = 0;
        private string $_nomHotel;
        private int $_nbEtoile;
        private string $_adresse;
        private string $_cp;
        private string $_ville;
        private array $_chambres;
        private array $_reservations =[];

        //->private array chambre.
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
            return ($this->_nomHotel." ".str_repeat("*", $this->_nbEtoile)." ".$this->_ville);
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
        public function getChambres(){
            return $this->_chambres;
        }
        public function getReservations(){
            return $this->_reservations;
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
        public function setChambre( Chambre $chambre){
            $this->_chambres[] = $chambre;
        }
        //---méthodes
        public function addReservation(Reservation $resa){
            $this->_reservations[]= $resa;
        }
        public function getReservationsNumber(string $typeRetour){
            $compteurResa = count($this->getReservations());
            if ($typeRetour == "int"){
                return $compteurResa;
            }
            else {
                $returnString ='';
                switch($compteurResa){
                    case 0:
                        $returnString = "<div class=clear>Aucune Réservation</div>";
                        break;
                    case 1:
                        $retunrString = "<div class=green>1 Réservation</div>";
                        break;
                    default:
                        $returnString = "<div class=green>".$compteurResa." Réservations</div>";
                }
                return $returnString;
            }
        }
    }