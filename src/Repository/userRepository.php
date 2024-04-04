<?php
namespace src\Repository;

use src\Models\User;
use src\Models\Database;
use PDO;
class UserRepository extends Database 
{
    public function getAll()
    {
        $data = $this->getDB()->query('SELECT * FROM user');

        $users = [];

        foreach ($data as $user) {
            $newUser = new User(
                $user['id'],
                $user['nom'],
                $user['prenom'],
                $user['email'],
                $user['mdp'],
                $user['telephone'],
                $user['adressePostale'],


            );

            $users[] = $newUser;
        }

        return $users;
    }

    public function create($newUser)
    {
        $request = 'INSERT INTO user (nom,	prenom,	email, mdp, telephone, adressePostale) VALUES ( :nom, :prenom, :email, :mdp, :telephone, :adressePostale)';
        $query = $this->getDB()->prepare($request);
        

        $query->execute([
           'nom'=> $newUser->getNom(),
            'prenom'=> $newUser->getPrenom(),
            'email' =>$newUser->getEmail(),
            'mdp' =>$newUser->getMotDePasse(),
            'telephone' => $newUser->getTelephone(),
            'adressePostale' => $newUser->getAdressePostale(),
            // 'Id' => $newUser->getId(),
        ]);
    }


    public function update($User)
{
    $request = "UPDATE user SET nom = ?, prenom = ?, email= ?, mdp = ?, telephone = ?, adressePostale = ? WHERE id = ?";
    
    $query = $this->getDB()->prepare($request);


    $query->execute([
        $User->getId(),
        $User->getNom(),
        $User->getPrenom(),
        $User->getEmail(),
        $User->getMotDePasse(),
        $User->getTelephone(),
        $User->getAdressePostale(),
    ]);
    

    } 

    public function delete($User)
{
    $request = "DELETE FROM user WHERE id = ?";
    
    $query = $this->getDB()->prepare($request);

    $query->execute([$User]);
}
}
