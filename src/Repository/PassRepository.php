<?php
namespace src\Repository;

use src\Models\Pass;
use src\Models\Database;

class PassRepository extends Database
{
    public function getAll()
    {
        $data = $this->getDB()->query('SELECT * FROM pass');

        $passes = [];

        foreach ($data as $pass) {
            $newPass = new Pass(
                $pass['id'],
                $pass['jour'],
                $pass['tarif_reduit'],
                $pass['date_jour'],
                $pass['prix'],
                
            );

            $passes[] = $newPass;
        }
        return $pass;
    }

    public function create($newPass)
    {
        $request = 'INSERT INTO pass (jour,	tarif_reduit,	date_jour, prix) VALUES ( :jour, :tarif_reduit, :date_jour, :prix)';
        $query = $this->getDB()->prepare($request);
        

        $query->execute([
           'jour'=> $newPass->getJour(),
            'tarif_reduit'=> $newPass->getTarifReduit(),
            'date_jour' =>$newPass->getDateJour(),
            'prix' =>$newPass->getPrix(),
        
        ]);


    }
}
