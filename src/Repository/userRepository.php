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

        return $user;
    }

    public function create($newUser)
    {
        $request = 'INSERT INTO user (nom,	prenom,		email, mdp, telephone, adressePostale) VALUES ( :nom, :prenom, :email, :mdp, :telephone, :adressePostale)';
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


    public function update($user)
{
    $request = "UPDATE user SET nom = ?, prenom = ?, email= ?, mdp = ?, telephone = ?, adressePostale = ? WHERE id = ?";
    
    $query = $this->getDB()->prepare($request);


    $query->execute([
        $user->getId(),
        $user->getNom(),
        $user->getPrenom(),
        $user->getEmail(),
        $user->getMotDePasse(),
        $user->getTelephone(),
        $user->getAdressePostale(),
    ]);
    
} }
