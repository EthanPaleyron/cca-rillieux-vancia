<?php
namespace Project\Models;

use Project\Models\Horaire;

class HorairesManager extends Manager
{
    public function getHoraires(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM horaires ORDER BY CAST(heure_horaire AS TIME)");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
    public function getHorairesMatin(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM horaires WHERE temps_horaire = 'Matin' ORDER BY CAST(heure_horaire AS TIME)");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
    public function getHorairesApresmidi(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM horaires WHERE temps_horaire = 'Après Midi' ORDER BY CAST(heure_horaire AS TIME)");
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
    public function storeHoraire(string $temps, string $heure)
    {
        $stmt = $this->bdd->prepare("INSERT INTO horaires (temps_horaire, nom_horaire, heure_horaire) VALUES (?, ?, ?)");
        $stmt->execute(
            array(
                $temps,
                $_POST["nom_horaire"],
                $heure,
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
    public function updateHoraire(string $temps, string $heure)
    {
        $stmt = $this->bdd->prepare("UPDATE horaires SET temps_horaire = ?, heure_horaire = ?, nom_horaire = ? WHERE id_horaire = ?");
        $stmt->execute(
            array(
                $temps,
                $heure,
                $_POST["nom_horaire"],
                $_POST["id_horaire"],
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Horaire");
    }
}