<?php

class Etudiant extends PDO
{

    public function __construct()
    {
        // Constructeur de la classe Etudiant qui hérite de la classe PDO pour la gestion de la base de données MySQL
        parent::__construct("mysql:host=localhost;dbname=cours_enligne;charset=utf8", "root", "");
    }

    public function insert($table, $data)
    {
        // Prépare la liste des noms de champs pour la requête INSERT
        $nomChamp = implode(", ", array_keys($data));
        // Prépare la liste des valeurs des champs avec des marqueurs de liaison
        $valeurChamp = ":" . implode(", :", array_keys($data));

        // Crée la requête INSERT avec les noms de champs et les marqueurs de liaison
        $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";

        // Prépare la requête SQL
        $query = $this->prepare($sql);
        // Associe les valeurs aux marqueurs de liaison
        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        // Exécute la requête et retourne l'ID de l'insertion ou les informations d'erreur
        if (!$query->execute()) {
            return $query->errorInfo();
        } else {
            return $this->lastInsertId();
        }
    }

    public function select($table, $champOrdre = null, $ordre = null)
    {
        if ($champOrdre == null) {
            // Crée la requête SELECT sans ordre spécifié
            $sql = "SELECT idetudiant, concat(etudiant.prenom, ' ', etudiant.nom) AS nomEtudiant, phone, courriel, groupe.nom AS groupe FROM $table LEFT JOIN groupe ON groupe_idgroupe = idgroupe";
        } else {
            // Crée la requête SELECT avec un ordre spécifié
            $sql = "SELECT idetudiant, concat(etudiant.prenom, ' ', etudiant.nom) AS nomEtudiant, phone, courriel, groupe.nom AS groupe FROM $table LEFT JOIN groupe ON groupe_idgroupe = idgroupe ORDER BY $champOrdre $ordre";
        }
        // Exécute la requête SQL et retourne les résultats
        $query = $this->query($sql);
        return $query->fetchAll();
    }

    public function selectId($table, $champ, $id)
    {
        // Crée la requête SELECT avec une condition WHERE pour récupérer un enregistrement par ID
        $sql = "SELECT * FROM $table WHERE $champ = :$champ";
        $query = $this->prepare($sql);
        $query->bindValue(":$champ", $id);
        $query->execute();
        // Retourne l'enregistrement trouvé
        return $query->fetch();
    }

    public function update($table, $data, $champ, $id)
    {
        $champRequete = null;
        foreach ($data as $key => $value) {
            // Prépare la liste des champs à mettre à jour avec des marqueurs de liaison
            $champRequete .= $key . "=:" . $key . ", ";
        }
        $champRequete = rtrim($champRequete, ", ");
        // Crée la requête UPDATE avec les champs à mettre à jour et une condition WHERE
        $sql = "UPDATE $table SET $champRequete WHERE $champ = :$champ";

        // Prépare la requête SQL
        $query = $this->prepare($sql);
        // Associe les nouvelles valeurs aux marqueurs de liaison
        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }

        // Exécute la requête et retourne l'ID mis à jour ou les informations d'erreur
        if (!$query->execute()) {
            print_r($query->errorInfo());
        } else {
            return $id;
        }
    }

    public function delete($table, $id, $url)
    {
        // Crée la requête DELETE avec une condition WHERE pour supprimer un enregistrement par ID
        $sql = "DELETE FROM $table WHERE idetudiant = :id";
        $query = $this->prepare($sql);
        $query->bindValue(":id", $id);
        // Exécute la requête DELETE et redirige vers l'URL spécifiée en cas de succès
        if (!$query->execute()) {
            print_r($query->errorInfo());
        } else {
            header("Location: $url");
        }
    }
}
