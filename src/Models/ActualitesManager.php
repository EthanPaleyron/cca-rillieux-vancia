<?php
namespace Project\Models;

use Project\Models\Actualite;

class ActualitesManager extends Manager
{
    // Reccupere tout les actualites
    public function getActualites(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM actualites ORDER BY date_actualite DESC");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Actualite");
    }
    // Reccupere l'actualite choisi
    public function getActualite(int $id_actualite): Actualite
    {
        $stmt = $this->bdd->prepare("SELECT * FROM actualites WHERE id_actualite = ?");
        $stmt->execute(
            array(
                $id_actualite,
            )
        );
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\Actualite");
        return $stmt->fetch();
    }
    // Reccupere la derniere actualite creer
    public function getLastActualite(): Actualite
    {
        $stmt = $this->bdd->prepare("SELECT * FROM actualites WHERE date_actualite = (SELECT MAX(date_actualite) FROM actualites)");
        $stmt->execute(
            array(
            )
        );
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\Actualite");
        return $stmt->fetch();
    }
    // Ajoute une nouvelle actualite
    public function insertActualite(string $datetime, string $file): void
    {
        $stmt = $this->bdd->prepare("INSERT INTO actualites (nom_actualite, description_actualite, date_actualite, image_actualite) VALUES (?, ?, ?, ?)");
        $stmt->execute(
            array(
                $_POST["nom_actualite"],
                $_POST["description_actualite"],
                $datetime,
                $file,
            )
        );
    }
    // Supprime actualite choisi
    public function deleteActualite(int $id_actualite): void
    {
        $stmt = $this->bdd->prepare("DELETE FROM actualites WHERE id_actualite = ?");
        $stmt->execute(
            array(
                $id_actualite,
            )
        );
    }
    public function updateActualite($file): void
    {
        $stmt = $this->bdd->prepare("UPDATE actualites SET nom_actualite = ?, description_actualite = ?, date_actualite = ?,image_actualite = ? WHERE id_actualite = ?");
        $stmt->execute(
            array(
                $_POST["nom_actualite"],
                $_POST["description_actualite"],
                $_POST["date_actualite"],
                $file,
                $_POST["id_actualite"],
            )
        );
    }
}