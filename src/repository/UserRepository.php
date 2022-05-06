<?php

require_once "./../lib/repository/Repository.php";

class UserRepository extends Repository
{


    private const  USER_TABLE = "CREATE TABLE IF NOT EXISTS user(
                                id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                username TEXT NOT NULL,
                                password VARCHAR(255));";


    private const USER_INSERT = "INSERT INTO user(username, password) VALUES(
        'admin',
        '$2y$10\$B7e9Vf30Su7dMDrrKn8.TuUPLI2XJtPkvPLllbPaORN2hzYMQPQp.'
    );";


    private $table;

    function __construct(string $table)
    {
        $this->table = $table;
    }

    public function findOneByUsername(string $username): ?User
    {
        $this->createTableIfNotExistes($this->table, self::USER_TABLE, self::USER_INSERT);

        $user = null;

        $query = "SELECT * from user WHERE username = :username;";
        $params = [":username" => $username];

        $result = $this->executeQuery($query, $params);

        if (count($result = $result->fetchAll(PDO::FETCH_CLASS, "user"))) {
            $user = $result[0];
        }

        return $user;
    }
}
