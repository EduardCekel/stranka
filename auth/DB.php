<?php

class DB 
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=zdruzena', 'root', 'dtb456');
    }

    /**
     * @return Formular[]
     */
    public function getAllPosts() 
    {
        $stm = $this->pdo->query("SELECT * FROM formulars");
        return $stm->fetchAll(PDO::FETCH_CLASS, Formular::class);
    }

    public function storePost($post)
    {
        $sql = "INSERT INTO formulars (id_user,post) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$post->id_user, $post->post]);
    }

    public function remove($id)
    {
        $sql = "DELETE FROM formulars WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function update($id, $post)
    {
        $sql = "UPDATE formulars SET post=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$post, $id]);
    }

    /** Uzivatelia */

    /**
     * @return Uzivatel[]
     */
    public function getAllUsers() 
    {
        $stm = $this->pdo->query("SELECT * FROM users");
        return $stm->fetchAll(PDO::FETCH_CLASS, Uzivatel::class);
    }

    public function storeUser($user)
    {
        $sql = "INSERT INTO users (meno,priezvisko,email,heslo) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user->meno,$user->priezvisko,$user->email,$user->heslo]);
    }

    public function removeUser($id)
    {
        $sql = "DELETE FROM users WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $sql = "UPDATE users SET id = id-1 WHERE id > ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}