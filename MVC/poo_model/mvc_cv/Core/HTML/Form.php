<?php 
     //** données utilisées par le formulaire **//
    public function __construct($data = array()){
        $this->data = $data;
    }

    protected function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    //** index de la valeur à récupérer **//
    protected function getValue($index){
        if(is_objet($this->data)){
            return $this->data->$index;
        }else{
        return isset($this->data[$index]) ? $this->data[$index] : null;
        }
    }

    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
        '<input type="' . $type . '" name="' . $name '" value="' . $this-getValue($name) . '">'
        );
    }

    public function submit(){
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}
