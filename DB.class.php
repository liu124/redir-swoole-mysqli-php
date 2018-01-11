<?php

/**
 * Created by PhpStorm.
 * User: wdg003
 * Date: 2018/1/6
 * Time: 10:38
 */
class DB
{
    private $host;
    private $username;
    private $passwd;
    private $dbname;
    private $port;
    private $db;
    private $charset;

    public function __construct($host, $username, $passwd, $dbname, $port, $charset)
    {
        $this->host = isset($host) ? $host : '127.0.0.1';
        $this->username = isset($username) ? $username : 'root';
        $this->passwd = isset($passwd) ? $passwd : 'Liu19920201';
        $this->dbname = isset($dbname) ? $dbname : 'ceshi';
        $this->port = isset($port) ? $port : '3306';
        $this->charset = isset($charset) ? $charset : 'utf-8';
        $this->db_connect();
        //$this->db_charset();
    }

    public function db_connect()
    {
        $this->db = new mysqli($this->host, $this->username, $this->passwd, $this->dbname, $this->port) or die('连接数据库失败');
    }

    public function db_charset()
    {
        $db = $this->db;
        $db->query('set names urf-8') or die('设置编码错误');
    }

    public function db_query()
    {
        $db = $this->db;
        $sql = "select * from lava_goods";
        $result = $db->query($sql);
        $data = array();
        while ($obj = mysqli_fetch_assoc($result)) {
            $data[] = $obj;
        }
        return $data;
    }
}