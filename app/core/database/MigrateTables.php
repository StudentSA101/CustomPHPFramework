<?php
 
namespace App\core\database;
 
/**
 * SQLite Create Table Demo
 */
class MigrateTables 
{
 
    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;
 
    /**
     * connect to the database
     */
    public function __construct($pdo) 
    {
        $this->pdo = $pdo;
    }
 
    /**
     * create tables 
     */
    public function createTables() 
    {
        /**
         * Setup SQL
         */
        $commands = [
            'CREATE TABLE IF NOT EXISTS projects (
                project_id   INTEGER PRIMARY KEY,
                project_name TEXT NOT NULL
                )',
            'CREATE TABLE IF NOT EXISTS tasks (
                task_id INTEGER PRIMARY KEY,
                task_name  VARCHAR (255) NOT NULL,
                completed  INTEGER NOT NULL,
                start_date TEXT,
                completed_date TEXT,
                project_id VARCHAR (255),
                FOREIGN KEY (project_id)
                REFERENCES projects(project_id) 
                ON UPDATE CASCADE
                ON DELETE CASCADE)'
        ];
        /**
         * Executes command to create new table
         */
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    } 
}