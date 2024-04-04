<?php
namespace src\Repository;

use src\Models\Nuite;
use src\Models\Database;
use PDO;
class NuiteRepository extends Database 
{
    public function getAll()
    {
        $data = $this->getDB()->query('SELECT * FROM nuite');

        $nuites = [];

        foreach ($data as $nuite) {
            $newNuite = new Nuite(
                $nuite['id'],
                $nuite['nom'],
                $nuite['prix'],
 );

            $nuites[] = $newNuite;
        }

        return $nuite;
    }

    public function create($newNuite)
    {
        $request = 'INSERT INTO nuite (nom,	prix) VALUES ( :nom, :prix)';
        $query = $this->getDB()->prepare($request);
        

        $query->execute([
           'nom'=> $newNuite->getNom(),
            'prix'=> $newNuite->getPrix(),
        
        ]);
    }

}