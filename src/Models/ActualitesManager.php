<?php
namespace Project\Models;

use Project\Models\Actualite;

class ActualitesManager extends Manager
{
    public function getActualites(): array
    {
        $stmt = $this->bdd->prepare("SELECT * FROM actualite ORDER BY date_actualite DESC");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Actualite");
    }
    public function addActualite(string $date, string $file): void
    {
        $stmt = $this->bdd->prepare("INSERT INTO actualite (nom_actualite, description_actualite, date_actualite, image_actualite) VALUES (?, ?, ?, ?)");
        $stmt->execute(
            array(
                $_POST["nom_actualite"],
                $_POST["description_actualite"],
                $date,
                $file,
            )
        );
    }
}