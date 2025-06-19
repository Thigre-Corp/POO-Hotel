<?php

    class Client {
        //---propriétés
        static int $_id_Client = 0;
        private string $_nomClient;
        private string $_prenomClient;
        private array $_reservations;
        //---constructor
        public function __construct(string $nomClient, string $prenomClient){
            $this->_nomClient = $nomClient;
            $this->_prenomClient = $prenomClient;
            ++self::$_id_Client;
        }
        //---toString
        public function __toString(){
            return ($this->_prenomClient." ".$this->_nomClient);
        }
        //---getters
        public function getNom(){
            return $this->_nomClient;
        }
        public function getPrenom(){
            return $this->_prenomClient;
        }
        public function getReservations(){
            return $this->_reservations;
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
        //---méthodes
        public function addReservation(Reservation $resa){
            $this->_reservations[] = $resa;
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


