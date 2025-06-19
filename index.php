<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO-Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Exercice Hôtel</h1>
<?php 

    require 'Hotel.php';
    require 'Chambre.php';
    require 'Client.php';
    require 'Reservation.php';

    //instancier des clients...
    $paul = new Client("PAUL", "Billy");
    $gibello = new Client("GIBELLO", "Virgile");
    $murman = new Client("MURMAN", "Micka");

    //...des hotels...
    $california = new Hotel("California", 5, "Such a", "lovely", "Place");
    $hilton = new Hotel("Hilton", 4, "10 rue de la gare", "67000", "STRASBOURG");
    $regent = new Hotel("Le Regent", 4, "61 rue Dauphine", "75006", "PARIS");

    //...des chambres...
    for ($i=1; $i<=30; $i++){
        if ($i<10){
            ${"chambreH$i"} = new Chambre($i, 2, false, 120.00, $hilton);
        }
        else{
            ${"chambreH$i"} = new Chambre($i, 2, true, 300.00, $hilton);
        }

    }
    for ($i=1; $i<=10; $i++){
        if ($i<5){
            ${"chambreR$i"} = new Chambre($i, 2, false, 400.00, $regent);
        }
        else{
            ${"chambreR$i"} = new Chambre($i, 2, true, 600.00, $regent);
        }
    }
    $chambreJaune = new Chambre( 7, 2 , true , 30.00 , $california);
    $chambreRouge = clone $chambreJaune;
    $chambreRouge->setNumChambre(3);

    //...des reservations
    $resa1 = new Reservation( $paul, $chambreJaune, "11/12/2024", "24/12/2024");
    $resa2 = new Reservation( $paul, $chambreRouge, "05/03/2025", "08/03/2025");
    $resa4 = new Reservation( $gibello, $chambreH17, "01/01/2021", "01/01/2021");
    $resa5 = new Reservation( $murman, $chambreH3, "11/03/2021", "15/03/2021");
    $resa6 = new Reservation( $murman, $chambreH4, "01/04/2021", "17/04/2021");

    // retourner l'état des réservation de $hilton, sans considération de date
    echo " 

    <div id='hotel'>
        <h2>
            $hilton
        </h2>
        <span class='adresse'>".
            $hilton->getAdresse()." ".$hilton->getCp()." ".$hilton->getVille()."
        </span>
        <table>
            <tr>
                <td>
                    Nombre de chambres : 
                </td>
                <td>".count($hilton->getChambres())."</td>
            </tr>
            <tr>
                <td>
                    Nombre de chambres réservées : 
                </td> 
                <td>".$hilton->getReservationsNumber("int")."</td>
            </tr>
            <tr>
                <td>
                    Nombre de chambres disponibles : 
                </td>
                <td>".count($hilton->getChambres())-$hilton->getReservationsNumber("int")."</td>
            </tr>
        </table>
    </div>
        ";

    //retourner les réservations appartenant à Hilton, idem
    echo "
    <div class='resa'>
        <h2>
            Réservations de l'hôtel ".$hilton."
        </h2>".
        $hilton->getReservationsNumber('string')."
        <table>";
            foreach($hilton->getReservations() as $objetResa){
                echo "<tr><td>".
                $objetResa.
                "</td></tr>";
            }
        echo "
        </table>
    </div>";

    //idem Regent
    echo "
    <div class='resa'>
        <h2>
            Réservations de l'hôtel ".$regent."
        </h2>".
        $regent->getReservationsNumber('string')."
        <table>";
            foreach($regent->getReservations() as $objetResa){
                echo "<tr><td>".
                $objetResa.
                "</td></tr>";
            }
        echo "
        </table>
    </div>";

    //retourner les réservations de Micka
    echo "
    <div class='resa'>
        <h2>
            Réservations de ".$murman."
        </h2>".
        $murman->getReservationsNumber('string')."
        <table>";
            $coutTotal=0;
            foreach($murman->getReservations() as $objetResa){
                $tempsPasse = $objetResa->getDateDebut()->diff($objetResa->getDateFin())->format("%a");

                echo "<tr><td>".
                "<b>Hotel : ".$objetResa->getChambre()->getHotel()."</b> / Chambre : ".$objetResa->getChambre()." du ".$objetResa->getDateDebut()->format("d/m/Y")." au ".$objetResa->getDateFin()->format("d/m/Y").
                "</td></tr>";
                $coutTotal += $objetResa->getChambre()->getTarif()*$tempsPasse;
            }
        echo "
        </table>
        <div class='total'>
            Total : ".$coutTotal." €
        </div>
    </div>";

    //retourner le statut des chambres de Hilton
    echo "
    <div class='statut'>
        <h2>
            Status des Chambres de ".$hilton."
        </h2>
        <table>
            <tr>
                <th>CHAMBRE</th>
                <th>PRIX</th>
                <th>WIFI</th>
                <th>ETAT</th>
            </tr>";
            foreach($hilton->getChambres() as $objetResa){
                echo "<tr><td>".
                "Chambre ".$objetResa->getNumChambre()."</td><td>".
                $objetResa->getTarif()." €</td><td>";
                if ($objetResa->getPossedeWifi()){
                    echo"<img src='./img/wifi.jpg' alt='cette chambre possède le wifi'>";
                }
                echo "</td><td>";
                if($objetResa->getDisponible()){
                    echo "<div class='green'>DISPONIBLE</div>";
                }
                else{
                    echo "<div class='red'>RESERVEE</div>";
                }
                echo "</td></tr>";
            }
        echo "
        </table>
    </div>";

    