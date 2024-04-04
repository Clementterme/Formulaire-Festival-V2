<?php

class ReservationRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM Reservation Where id = :id');
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        if (!$data) {
            return null;
        }

        return new Reservation(
            $data['nb_resa'],
            $data['enfants'],
            $data['luge'],
            $data['casque'],
            $data['id']
        );
    }

    public function save (Reservation $reservation)
    {
        if ($reservation->getId() === null) {
            $this->insert($reservation);
        } else {
            $this->update($reservation);
        }
    }

    private function insert (Reservation $reservation)
    {
        $stmt = $this->pdo->prepare('INSERT INTO reservation (nb_resa, enfants, luge, casque) VALUES (:nb_resa, :enfants, :luge, :casque)');

        $stmt->execute([
            'nb-resa' => $reservation->getNbResa(),
            'enfants' => $reservation->getEnfants(),
            'luge' => $reservation->getLuge(),
            'casque' => $reservation->getCasque(),

        ]);

        $reservation->setId($this->pdo->lastInsertId());
    }

    private function update(Reservation $reservation)
    {
        $stmt = $this->pdo->prepare ('UPDATE reservations SET nb_resa = :nb_resa, enfants = :enfants, luge = :luge, casque = :casque WHERE id = :id');
        $stmt->execute([
            'nb_resa' => $reservation->getNbResa(),
            'enfants' => $reservation->getEnfants(),
            'luge' => $reservation->getLuge(),
            'casque' => $reservation->getCasque(),
            'id' => $reservation->getId,
        ]);
    }
}