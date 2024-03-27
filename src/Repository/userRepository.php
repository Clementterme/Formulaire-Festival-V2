<?php
class UserRepository extends Database 
{
    public function getAll()
    {
        $data = $this->getDB()->query('SELECT * FROM user');

        $user = [];

        foreach ($data as $user) {
            $newUser = new User(
                $user['Id'],
                $user['Nom'],
                $user['Prénom'],
                $user['Email'],
                $user['MotDePasse'],
                $user['Telephone'],
                $user['AdressePostale'],


            );

            $user[] = $newUser;
        }

        return $user;
    }

    public function create($newUser)
    {
        $request = 'INSERT INTO todo_user (Nom,	Prenom,		Email, MotDePasse, Telephone, AdressePostale) VALUES ( :Nom, :Prenom, :Email, :MotDePasse, :Telephone, :AdressePostale)';
        $query = $this->getDB()->prepare($request);
        

        $query->execute([
           'Nom'=> $newUser->getNom(),
            'Prenom'=> $newUser->getPrenom(),
            'Email' =>$newUser->getEmail(),
            'MotDePasse' =>$newUser->getMotDePasse(),
            'Telephone' => $newUser->getTelephone(),
            'AdressePostale' => $newUser->getAdressePostale(),
            // 'Id' => $newUser->getId(),
        ]);
    }


    public function update($user)
{
    $request = "UPDATE user SET Nom = ?, Prénom = ?, Email= ?, MotDePasse = ?, Telephone = ?, AdressePostale = ? WHERE id = ?";
    
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
