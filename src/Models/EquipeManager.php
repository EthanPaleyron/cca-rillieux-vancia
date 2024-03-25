<?php
namespace Project\Models;

use Project\Models\Equipier;

class EquipeManager extends Manager
{
    // Reccupere tout l'equipe
    public function getEquipe(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM equipe ORDER BY ordre_equipier");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Equipier");
    }
    // Reccupere l'equipier choisi
    public function getEquipier(int $id_equipier): Equipier
    {
        $stmt = $this->bdd->prepare("SELECT * FROM equipe WHERE id_equipier = ?");
        $stmt->execute(
            array(
                $id_equipier,
            )
        );
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\Equipier");
        return $stmt->fetch();
    }
    // Créer un nouvelle equiper
    public function insertEquipier(string $file): void
    {
        $stmt = $this->bdd->prepare("INSERT INTO equipe (nom_equipier, description_equipier, photo_equipier, ordre_equipier) VALUES (?, ?, ?, ?)");
        $stmt->execute(
            array(
                $_POST["nom_equipier"],
                $_POST["description_equipier"],
                $file,
                $_POST["ordre"]
            )
        );
    }
    public function orderMax(): array
    {
        $stmt = $this->bdd->prepare("SELECT MAX(ordre_equipier), id_equipier FROM equipe");
        $stmt->execute(
            array(
            )
        );
        $result = $stmt->fetch();
        $maxValue = $result[0]; // Recuperer la valeur maximale
        $idEquipier = $result[1]; // Recuperer l'id de l'équipier
        return [$maxValue, $idEquipier];
    }
    public function orderEquipe(int $i, int $lastId): void
    {
        $stmt = $this->bdd->prepare("UPDATE equipe SET ordre_equipier = ? WHERE ordre_equipier = ? AND id_equipier <> ?");
        $stmt->execute(
            array(
                $i + 1,
                $i,
                $lastId,
            )
        );
    }
    public function deleteEquipier(int $id_equipier): void
    {
        $stmt = $this->bdd->prepare("DELETE FROM equipe WHERE id_equipier = ?");
        $stmt->execute(
            array(
                $id_equipier,
            )
        );
    }
    public function updateEquipier(string $file): void
    {
        $stmt = $this->bdd->prepare("UPDATE equipe SET nom_equipier = ?, description_equipier = ?, photo_equipier = ? WHERE id_equipier = ?");
        $stmt->execute(
            array(
                $_POST["nom_equipier"],
                $_POST["description_equipier"],
                $file,
                $_POST["id_equipier"],
            )
        );
    }
}