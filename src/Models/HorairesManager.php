<?php
namespace Project\Models;

use Project\Models\Horaire;

class HorairesManager extends Manager
{
    public function getHoraires(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM horaires ORDER BY heure_horaire");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
    public function getHorairesMatin(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM horaires WHERE TIME(heure_horaire) BETWEEN '06:00:00' AND '11:59:59' ORDER BY heure_horaire");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
    public function getHorairesApresMidi(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM horaires WHERE TIME(heure_horaire) BETWEEN '12:00:00' AND '17:59:59' ORDER BY heure_horaire");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
    public function getHorairesSoir(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM horaires WHERE TIME(heure_horaire) BETWEEN '17:00:00' AND '00:00:00' ORDER BY heure_horaire");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
    public function getHoraire(int $id_horaire)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM horaires WHERE id_horaire = ?");
        $stmt->execute(
            array(
                $id_horaire,
            )
        );
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\Horaire");
        return $stmt->fetch();
    }
    public function storeHoraire()
    {
        $stmt = $this->bdd->prepare("INSERT INTO horaires (nom_horaire, heure_horaire) VALUES (?, ?)");
        $stmt->execute(
            array(
                $_POST["nom_horaire"],
                $_POST["heure_horaire"],
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
    public function deleteHoraire(int $id_horaire)
    {
        $stmt = $this->bdd->prepare("DELETE FROM horaires WHERE id_horaire = ?");
        $stmt->execute(
            array(
                $id_horaire,
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
    public function updateHoraire()
    {
        $stmt = $this->bdd->prepare("UPDATE horaires SET heure_horaire = ?, nom_horaire = ? WHERE id_horaire = ?");
        $stmt->execute(
            array(
                $_POST["heure_horaire"],
                $_POST["nom_horaire"],
                $_POST["id_horaire"],
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
}