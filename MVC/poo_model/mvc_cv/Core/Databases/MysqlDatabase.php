    }
    return $this->pdo;
}

    public function query($statement, $class_name = null, $one = false){
        $req = $this->getPDO()->query($statement);
        if(
        strpos($statement, 'UPDATE') === 0 ||
        strpos($statement, 'INSERT') === 0 ||
        strpos($statement, 'DELETE') === 0
        ){
            return $req;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $attributes, $class_name = null, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if(
        strpos($statement, 'UPDATE') === 0 ||
        strpos($statement, 'INSERT') === 0 ||
        strpos($statement, 'DELETE') === 0
        ){
            return $res;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }
