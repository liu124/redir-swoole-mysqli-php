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
   /** 构造方法
    * @param srting $host，IP地址，默认为空
    * @param strimg $username，用户，默认为空
    * @param strimg $passwd，密码，默认为空
    * @param strimg $dbname，数据库名，默认为空
    * @param strimg $port，端口，默认为空
    * @param strimg $charset，字符，默认为空
    */
    public function __construct($host=null, $username=null, $passwd=null, $dbname=null, $port=null, $charset=null)
    {
        $this->host = isset($host) ? $host : '127.0.0.1';
        $this->username = isset($username) ? $username : 'root';
        $this->passwd = isset($passwd) ? $passwd : 'Liu19920201';
        $this->dbname = isset($dbname) ? $dbname : 'ceshi';
        $this->port = isset($port) ? $port : '3306';
        $this->charset = isset($charset) ? $charset : 'utf-8';
        //调用连接数据库
        $this->db_connect();
    }
     /** 连接mysql数据库
     */
    public function db_connect()
    {
        $this->db = new mysqli($this->host, $this->username, $this->passwd, $this->dbname, $this->port) or die('连接数据库失败');
    }
    /** 执行sql语句
     * @return mixed，返回全部执行sql语句，失败返回错误信息
    */
    private function db_query($sql)
    {
        $db = $this->db;
        $res = $db->query($sql)or die('sql语句执行失败');
        return $res;
    }
    /** 查询多条记录
     * @param string $sql ,查询sql语句
     * @return mixed，成功返回二维数组，失败返回false
     */
    public function db_getAll($sql)
    {
      $res = $this->db_query($sql);
      if(mysqli_num_rows($res))
      {
          $list = array();
          while($row = mysqli_fetch_assoc($res))
          {
             $list[] = $row;
          }
          return $list;
      }
      return false;
    }
    /** 查询一条记录
     * @param string $sql，查询sql语句
     * @return mixed，成功返回一维数组，失败返回false
     */
    public function db_getRow($sql)
    {
        $res = $this->db_query($sql);
        return mysqli_num_rows($res) ? mysqli_fetch_assoc($res) : false;
    }
    /** 更新数据
     * @param string $sql，要更新sql语句
     * @param boolean，成功返回受影响行数，失败返回false
     */
    public function db_update($sql)
    {
        $this->db_query($sql);
        return mysqli_affected_rows() ? mysqli_affected_rows() : false;
    }
    /** 删除数据
     * @param string $sql，要删除sql语句
     * @param boolean，成功返回受影响行数，失败返回false
     */
    public function db_delete($sql)
    {
        $this>$this->db_query($sql);
        return mysqli_affected_rows() ? mysqli_affected_rows() : false;
    }
    /** 添加数据
     * @param string $sql，要添加sql语句
     * @param boolean，成功返回受影响行数，失败返回false
     */
    public function db_insert($sql)
    {
        $this>$this->db_query($sql);
        return mysqli_affected_rows() ? mysqli_affected_rows() : false;
    }
    public function __destruct()
    {
        $db = $this->db;
        $db->mysqli_close();
    }
}