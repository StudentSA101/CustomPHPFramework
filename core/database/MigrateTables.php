<?php

/**
 * SQLite Create Table Demo
 */
class MigrateTables
{

    /**
     * Variableto house PDO class
     *
     * @var $database
     */
    private $database;

    /**
     * Dependency injection of particular database.
     *
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    /**
     * create tables
     *
     * @return void
     */
    public function createTables()
    {
        /**
         * Setup the Database, prepared statements are excluded.  File to act as a migration only.
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
                ON DELETE CASCADE)',
        ];
        /**
         * Executes command to create new table
         */
        foreach ($commands as $command) {
            $this->database->exec($command);
        }
    }
}
