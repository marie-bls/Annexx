<?php

try{
        // On se connecte à MySQL
        $conn = new PDO('mysql:host=localhost;dbname=annexx', 'root', 'root');
}
catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
}
        // Recherche
        $sql=$conn->prepare( "SELECT * FROM box WHERE ville LIKE '%" . $_POST['name'] ."%'");
        $sql->execute();
        $list = $sql->fetchAll();

        if($list > 0){

                foreach($list as $data){
                        echo
                        "<div class='card'>
                                <div class='card-header'>
                                ".$data['nom']." 
                                </div>

                                <div class='card-body'> 

                                        <h5 class='card-title'>
                                        ".$data['adresse']. "
                                        ".$data['ville']."
                                        </h5>

                                        <p class= 'card-text'>
                                        ".$data['téléphone']. "
                                        </p>
                                        <p class='card-text'>
                                        ".$data['horaires']. "
                                        </p>
                                </div>

                                <div class ='card-footer'>
                                        <a href='#' class='btn btn-danger'>
                                        En savoir plus
                                        </a>
                                </div>

                        </div>";
                }
        }

        else{
                echo "Pas de résultats";
        }


