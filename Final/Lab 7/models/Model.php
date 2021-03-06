<?php

/**
 * Can't access directly by URL
 */

// defined("_DIRECT_ACCESS") or exit("<h1>Your are not allowed</h1>");
define("_DIRECT_ACCESS", true);

require_once dirname(__FILE__, 2) . "/helper/functions.php";

require_once _ROOT_DIR . "models/Database.php";

abstract class Model
{
    public static function execute($query, $bindparams = [])
    {
        $conn = Database::getConnection();
        $is_success = false;

        if ($conn) {
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute($bindparams);

                $is_success = $stmt->rowCount() > 0 ? true : false;
            } catch (PDOException $e) {
                echo $e->getMessage();
                $is_success = false;
            }
        }

        $conn = null;

        return $is_success;
    }

    public static function get($query, $bindparams = [])
    {
        $conn = Database::getConnection();
        $results = [];

        if ($conn) {
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute($bindparams);

                $results = $stmt->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        $conn = null;
        
        return $results;
    }

    public abstract static function create(Admin $user);

    public abstract static function update($user);

    public abstract static function delete(int $id);
}

_print_r(Model::get("SELECT * FROM user WHERE User = 'nobir'"));