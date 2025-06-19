<?php 

    class Reservation{
        //---propriétés
        static int $_id_Reservation = 0;
        private Client $_client;
        private Chambre $_chambre;
        private DateTime $_dateDebut;
        private DateTime $_dateFin;
        //---constructor
        public function __construct( Client $client, Chambre $chambre, string $dateDebut, string $dateFin ){
            $this->_client = $client;
            $this->_chambre = $chambre;
            $this->_dateDebut = DateTime::createFromFormat("d/m/Y", $dateDebut, new DateTimeZone('Europe/Paris'));
            $this->_dateFin = DateTime::createFromFormat("d/m/Y", $dateFin, new DateTimeZone('Europe/Paris'));
            ++self::$_id_Reservation;
            $chambre->getHotel()->addReservation($this);
            $chambre->setDisponible(false);
            $client->addReservation($this);
        }
        //---toString
        public function __toString(){
            return ($this->_client." - Chambre ".$this->_chambre->getNumChambre()." du ".$this->_dateDebut->format("d/m/Y")." au ".$this->_dateDebut->format("d/m/Y"));
        }
        //---getters
        public function getClient(){
            return $this->_client;
        }
        public function getChambre(){
            return $this->_chambre;
        }
        public function getDateDebut(){
            return $this->_dateDebut;
        }
        public function getDateFin(){
            return $this->_dateFin;
        }
        public function getID(){
            return self::$_id_Reservation;
        }
        //---setters
        public function setClient(Client $client){
            $this->_client = $client;
        }
        public function setChambre(Chambre $chambre){
            $this->_chambre = $chambre;
        }
        public function setDateDebut(DateTime $dateDebut){
            $this->_dateDebut = $dateDebut;
        }
        public function setDateFin(DateTime $dateFin){
            $this->_dateFin = $dateFin;
        }
    }