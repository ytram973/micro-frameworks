<?


class UserRepository extends Repository{


    PRIVATE CONST  USER_TABLE = "CREATE TABLE IF NOT EXISTS user(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username TEXT NOT NULL,
    password VARCHAR(255));";


    PRIVATE CONST USER_INSERT = "INSERT INTO user(username, password) VALUES(
        'admin',
        '$2y$10\$B7e9Vf30Su7dMDrrKn8.TuUPLI2XJtPkvPLllbPaORN2hzYMQPQp.'
    );";


    private $table;

    function __construct(string $table){
        $this->table = $table;
    }

    public function findOneByUsername(string $username):User
    {
        $this->createTableIfNotExistes($this->table, self::USER_TABLE, self::USER_INSERT);

        $query = "SELECT * from user WHERE username = :username;";
        $params = [":username" => $username];

        $result = $this->executeQuery($query, $params);

        return $result->fetchAll(PDO::FETCH_CLASS, "user")[0];

    }
}