<?php

namespace Core\Table;

use Core\Database\Database;

class Table{

    protected $table;
    protected $db;

    public function __construct(Database $db){}

    public function all(){}

    public function find($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id= ?", [$id], true);
    }

    public function update($id, $fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
         $sql_parts = implode(', ', $sql_parts);
        die();
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id= ?", $attributes, true);
    }

    public function delete($id){
        return $this->query("DELETE FROM {$this->table} WHERE id= ?", [$id], true);
    }

    public function create($fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
         $sql_parts = implode(', ', $sql_parts);
        die();
        return $this->query("INSERT INTO {$this->table} SET $sql_part, $attributes, true);
    }

    public function extract($key, $value){
        $records = $this->all();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return
    }

    public function query($statement, $attributes = null, $one = false){
        if($attributes){
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }else{
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }
