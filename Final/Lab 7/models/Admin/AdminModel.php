<?php

/**
 * Can't access directly by URL
 */

defined("_DIRECT_ACCESS") or exit("<h1>Your are not allowed</h1>");

require_once dirname(__FILE__, 3) . "/helper/functions.php";

require_once _ROOT_DIR . "models/Admin/Admin.php";

class AdminModel extends Model
{
    public static function create($admin)
    {
        // $query = "INSERT INTO products (p_name, p_bp, p_sp) VALUES (:p_name, :p_bp, :p_sp)";

        // return parent::execute(
        //     $query,
        //     [
        //         ":p_name"   => $product->getName(),
        //         ":p_bp"     => $product->getBuyingPrice(),
        //         ":p_sp"     => $product->getSellingPrice(),
        //     ]
        // );
    }

    public static function update($admin)
    {
        // $query = "UPDATE products SET p_name = :p_name, p_bp = :p_bp, p_sp = :p_sp WHERE p_id = :p_id";

        // return parent::execute(
        //     $query,
        //     [
        //         ":p_name"   => $product->getName(),
        //         ":p_bp"     => $product->getBuyingPrice(),
        //         ":p_sp"     => $product->getSellingPrice(),
        //         ":p_id"     => $product->getId(),
        //     ]
        // );
    }

    public static function delete(int $admin_id)
    {
        // $query = "DELETE FROM products WHERE p_id = :p_id";

        // return parent::execute(
        //     $query,
        //     [
        //         ":p_id"     => $product_id,
        //     ]
        // );
    }

    public function getAdmin(int $id)
    {
        // $query = "SELECT * FROM products WHERE p_id = :p_id";
        // $results = parent::get($query, [
        //     ":p_id" => $id
        // ]);

        // if (count($results)) {
        //     return $results[0];
        // }

        // return false;
    }

    public static function getAll($search = "")
    {
        // $query = "SELECT * FROM products";

        // if (!empty($search)) {

        //     $query .= " WHERE p_name LIKE :search";

        //     return parent::get($query, [
        //         ":search" => "%$search%",
        //     ]);
        // }

        // return parent::get($query);
    }

    public static function authenticate(string $email, string $password)
    {
        $query = "SELECT * FROM admins WHERE a_email = :email AND a_password = :pass";

        $results = parent::get($query, [
            ":email" => $email,
            ":pass" => $password
        ]);

        if (count($results)) {
            return $results[0];
        }

        return [];
    }
}
