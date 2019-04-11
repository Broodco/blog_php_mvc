<?php
namespace Broodco\Blog\Models;
class Manager
{
    protected function DBConnect(){
        {
            $blog_DB = new \PDO('mysql:host=localhost;dbname=tuto_php_openclassrooms;charset=utf8','broodco_OC','openclassrooms',
            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            return $blog_DB;
        }
    }
}
?>