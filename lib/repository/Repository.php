<?php

abstract class Repository
{
    private const DATABASE_NAME = "mysql:host=db.3wa.io;port=3306;dbname=martyrabord_micro_framework";
    private const DATABASE_USERNAME = "martyrabord";
    private const DATABASE_PASSWORD = "e165e50f868486cc5eaa3ad45b7a9f23";

    public function __construct()
    {
    }

    /**
     * Initialise PDO connection with database
     */
    private function connect()
    {
        return new PDO(self::DATABASE_NAME, self::DATABASE_USERNAME, self::DATABASE_PASSWORD);
    }

    /**
     * @param string $query Request in SQL
     * @param array $params Params [":variableSQL" => "valeur",...]
     * @return query result
     */
    protected function executeQuery(string $query, array $params = [])
    {
        $conn = $this->connect();
        $result = $conn->prepare($query);
        foreach ($params as $key => $param) $result->bindValue($key, $param);
        $result->execute();
        $conn = null;
        return $result ;
    }

    /**
     * @param string $table Table Name
     * @return bool
     */
    protected function checkTableExists($table): bool
    {
        $tableNotExist = true;
        $query = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = '$table' AND TABLE_SCHEMA = 'martyrabord_micro_framework' ;";
        $result = $this->executeQuery($query)->fetchAll(PDO::FETCH_BOTH);
        if (is_countable($result) && count($result) > 0) $tableNotExist = false;
        return $tableNotExist;
    }

    /**
     * @param string $table TableName
     * @param string $tableQuery Request for create table
     * @param string $insertQuery Request for insert first elements
     */
    protected function createTableIfNotExistes(string $table, string $tableQuery, string $insretQuery)
    {
        if ($this->checkTableExists($table)) {
            $this->executeQuery($tableQuery);
            $this->executeQuery($insretQuery);
        }
    }
}
