<?php
class Model{ // fonction principales

    public $table;
    public $id;

    public function read($fields=null){ // lectures des données
        if($fields==null){
            $fields = "*";
        }
        $sql = "SELECT $fields FROM ".$this->table." WHERE id=".$this->$id;
        $req = mysql_query($sql) or die(mysql_error()."<br> =>".mysql_query();
        $data = mysql_fetch_assoc($req);
        foreach($data as $k->$v){
            $this->$k = $v;
        }
    }

    public function save($data){ // sauvegarde des données
        if(isset($data["id"]) && !empty($data["id"])){ // on vérifie si l'id est définit ou diférent du vide
            $sql = "UPDATE".$this->table." SET "; // dans se cas on construit la requete
            foreach($data as $k=>$v){ // en fonction de $data
                if($k!="id"){
                $sql .= "$k='$v',";// recupère la clé et la valeur  key=value.
            }
        }
            $sql = substr($sql,0,-1); // supprime le dernier caractère
            $sql .= "WHERE id=".$data["id"];
        }else{
                $sql = "INSERT INTO".$this->table."("; // dans se cas on construit la requete
                unset($data["id"]); // c'est un INSERT, onsupprime le $data[id]
                foreach($data as $k=>$v){ // en fonction de $data
                        if($k!="id"){
                    $sql .= "$k='$v',";// recupère la clé et la valeur  key=value.
                }
            }
                $sql = substr($sql,0,-1); // supprime le dernier caractère
                $sql .=") VALUES (";
                foreach($data as $k=>$v){
                    $sql .= "'$v',";
                }
                $sql = substr($sql,0,-1); // supprime le dernier caractère
                $sql .= ")";
            }
            mysql_query($sql) or die(mysql_error()."<br> =>".mysql_query();
                if(!isset($data["id"]){
                    $this->id=mysql_insert_id();
                }else{
                    $this->id = $data["id"];
                }
        }

    public function find($data=array()){
        $conditions = "1=1";
        $fields = "*";
        $limit = "";
        order = "id DESC";
        if(isset($data["conditions"])){ $conditions = $data["conditions"];}
        if(isset($data["fields"])){ $fields = $data["fields"];}
        if(isset($data["limit"])){ $limit ="LIMIT ".$data["limit"];}
        if(isset($data["order"])){ $order = $data["order"];}
        $sql = "SELECT $fields FROM ".$this->table." WHERE $conditions ORDER BY $order $limit";
        $req = mysql_query($sql) or die(mysql_error()."<br> =>".mysql_query();
        while($data = mysql_fetch_assoc($req)){
            $d[] = $data;
        }
    return $d;
    }

    public function del($id=null){
        if($id==null){$id = $this->id;}
        $sql = "DELETE FROM".$this->table." WHERE id=$id";
        $req = mysql_query($sql) or die(mysql_error()."<br> =>".mysql_query();

    }

    static function load($name){ //charge un model quand on en a besoin , inclut le fichier besoin pour instanciation
        require("$name.php");
        return new $name(); // instanciation du fichier
    }

}
 ?>
