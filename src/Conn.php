<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 02/03/2015
 * Time: 23:41
 */

class Conn {

    public $conn;

    /**
     * @return resource
     */
    public function connect() {
        $config = require __DIR__ . "/../config/parameters.php";
        $this->conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['dbname']);
        if (!$this->conn) {
            die('Não foi possível conectar: ' . mysql_error());
        }
        return $this->conn;

    }

    /**
     *return void
     */
    public function close() {
        mysqli_close($this->conn);
    }

    /**
     * @param $query
     * @param null $xtra
     * @return array|null
     */
    public function getAsArray($query, $xtra = null){
        $link = $this->connect();
        $queries = require __DIR__ . "/../config/queries.php";
        if($xtra != null){
            $result=mysqli_query($link,$queries[$query] . $xtra . " ORDER BY name");
        }else{
            $result=mysqli_query($link,$queries[$query]);
        }
        $return = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $this->close();
        return $return;
    }

    /**
     * @param $result
     * return void
     */
    public function insertNewResult($result){
        $link = $this->connect();
        $queries = require __DIR__ . "/../config/queries.php";
        $query = $queries['insertNewResult'];
        $this->mysqli_prepared_query($link, $query, "sssss", $result);
        $this->close();
    }

    /**
     * @param $link
     * @param $sql
     * @param bool $typeDef
     * @param bool $params
     * @return array|bool
     */
    protected function mysqli_prepared_query($link,$sql,$typeDef = FALSE,$params = FALSE){
        if($stmt = mysqli_prepare($link,$sql)){
            if(count($params) == count($params,1)){
                $params = array($params);
                $multiQuery = FALSE;
            } else {
                $multiQuery = TRUE;
            }

            if($typeDef){
                $bindParams = array();
                $bindParamsReferences = array();
                $bindParams = array_pad($bindParams,(count($params,1)-count($params))/count($params),"");
                foreach($bindParams as $key => $value){
                    $bindParamsReferences[$key] = &$bindParams[$key];
                }
                array_unshift($bindParamsReferences,$typeDef);
                $bindParamsMethod = new ReflectionMethod('mysqli_stmt', 'bind_param');
                $bindParamsMethod->invokeArgs($stmt,$bindParamsReferences);
            }

            $result = array();
            foreach($params as $queryKey => $query){
                foreach($bindParams as $paramKey => $value){
                    $bindParams[$paramKey] = $query[$paramKey];
                }
                $queryResult = array();
                if(mysqli_stmt_execute($stmt)){
                    $resultMetaData = mysqli_stmt_result_metadata($stmt);
                    if($resultMetaData){
                        $stmtRow = array();
                        $rowReferences = array();
                        while ($field = mysqli_fetch_field($resultMetaData)) {
                            $rowReferences[] = &$stmtRow[$field->name];
                        }
                        mysqli_free_result($resultMetaData);
                        $bindResultMethod = new ReflectionMethod('mysqli_stmt', 'bind_result');
                        $bindResultMethod->invokeArgs($stmt, $rowReferences);
                        while(mysqli_stmt_fetch($stmt)){
                            $row = array();
                            foreach($stmtRow as $key => $value){
                                $row[$key] = $value;
                            }
                            $queryResult[] = $row;
                        }
                        mysqli_stmt_free_result($stmt);
                    } else {
                        $queryResult[] = mysqli_stmt_affected_rows($stmt);
                    }
                } else {
                    $queryResult[] = FALSE;
                }
                $result[$queryKey] = $queryResult;
            }
            mysqli_stmt_close($stmt);
        } else {
            $result = FALSE;
        }

        if($multiQuery){
            return $result;
        } else {
            return $result[0];
        }
    }

}