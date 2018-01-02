<?php
namespace Core\HTML;

class BootstraForm extends Form{

    //** Code HTML a entourer **//

    protected function surround($html){

        return "<div class=\"form-group\">{$html}</div>";

    }

    public function input($name, $label, $options = []){
        $type = isset($option['type']) ? options['type'] : 'text';
        $label = '<label>' . $label . '</label>';
        if($type === 'textarea'){
        }else{
        $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        }
        return $this->surround($label. $input);
    }

    public function select($name, $label, $options){
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach($options as $k=> $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = 'selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    public function submit(){
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>')
    }
