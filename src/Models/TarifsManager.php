<?php
namespace Project\Models;

use Project\Models\Tarif;

class TarifsManager extends Manager
{
    public function getTarifs(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM tarifs ORDER BY ordre_tarif");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Tarif");
    }
    public function getTarif(int $id_tarif)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM tarifs WHERE id_tarif = ?");
        $stmt->execute(
            array(
                $id_tarif,
            )
        );
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\Tarif");
        return $stmt->fetch();
    }
    public function orderMax(): int
    {
        $stmt = $this->bdd->prepare("SELECT MAX(ordre_tarif) FROM tarifs");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchColumn();
    }
    public function findOrderID(int $order): int
    {
        $stmt = $this->bdd->prepare("SELECT id_tarif FROM tarifs WHERE ordre_tarif = ?");
        $stmt->execute(
            array(
                $order,
            )
        );
        return $stmt->fetchColumn();
    }
    public function orderTarifs(int $position, int $id): void
    {
        $stmt = $this->bdd->prepare("UPDATE tarifs SET ordre_tarif = ? WHERE id_tarif = ?");
        $stmt->execute(
            array(
                $position,
                $id,
            )
        );
    }
    public function storeTarif(): void
    {
        $stmt = $this->bdd->prepare("INSERT INTO tarifs (nom_tarif, tarif_premier_chien, tarif_deuxieme_chien, tarif_par_chien, ordre_tarif) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(
            array(
                $_POST["nom_tarif"],
                $_POST["premier_chien"],
                $_POST["deuxieme_chien"],
                $_POST["par_chien"],
                $_POST["ordre_tarif"],
            )
        );
    }
    public function deleteTarif(int $id_tarif): void
    {
        $stmt = $this->bdd->prepare("DELETE FROM tarifs WHERE id_tarif = ?");
        $stmt->execute(
            array(
                $id_tarif,
            )
        );
    }
    public function updateTarif(int $id_tarif): void
    {
        $stmt = $this->bdd->prepare("UPDATE tarifs SET nom_tarif = ?, tarif_premier_chien = ?, tarif_deuxieme_chien = ?, tarif_par_chien = ? WHERE id_tarif = ?");
        $stmt->execute(
            array(
                $_POST["nom_tarif"],
                $_POST["premier_chien"],
                $_POST["deuxieme_chien"],
                $_POST["par_chien"],
                $id_tarif,
            )
        );
    }
}