<?php
/**
 * Created by PhpStorm.
 * User: ricblt
 * Date: 26/02/14
 * Time: 11:03
 */

namespace joboffer\Core;


class Db
{
    /**
     * @var \mysqli
     */
    private $con;

    /**
     * @var Db
     */
    private static $db;

    /**
     * @param $user
     * @param $password
     * @param $dbname
     * @param string $host
     * @throws \Exception
     */
    public function __construct($user, $password, $dbname, $host = 'localhost')
    {
        $this->con = mysqli_connect($host, $user, $password);
        if (!$this->con) {
            throw new \Exception("Connection failed:" . mysqli_error($this->con));
        }
        if (!mysqli_select_db($this->con, $dbname)) {
            throw new \Exception("Can't use {$dbname} : " . mysqli_error($this->con));
        }
    }

    /**
     * returns query results
     * @param $sql
     * @return bool|\mysqli_result
     * @throws \Exception
     */
    public function query($sql)
    {
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            throw new \Exception(mysqli_error($this->con));
        }
        return $result;
    }

    /**
     * @param $result
     * @param $className
     * @return null|object
     */
    public function fetch($result, $className)
    {
        return mysqli_fetch_object($result, $className);
    }

    /**
     * @param $result
     * @param $className
     * @return array
     */
    public function fetchAll($result, $className)
    {
        $entities = array();
        if (is_string($result)) {
            $result = $this->query($result);
        }
        while ($entity = $this->fetch($result, $className)) {
            $entities[] = $entity;
        }
        return $entities;
    }

    /**
     * @param Db $db
     */
    public static function setDefaultInstance(Db $db)
    {
        self::$db = $db;
    }

    /**
     * @return Db
     */
    public static function getDefaultInstance()
    {
        return self::$db;
    }
}
