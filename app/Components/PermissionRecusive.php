<?php


namespace App\Components;


class PermissionRecusive
{
    private $data;
    private $htmlPermissionSelect = '';
    public function __construct($data)
    {
        $this ->data = $data;
    }
    public function permissionDEQUY ($parent_id, $id = 0, $text =''){
//        $data = Category::all();
        foreach ($this -> data as $value){
            if ($value['parent_id'] == $id){
                if( !empty($parent_id) && $parent_id == $value['id'] ){
                    $this ->htmlPermissionSelect .= "<option selected value='".$value['id']."'>".$text.$value['name']."</option>";
                }else{
                    $this ->htmlPermissionSelect .= "<option value='".$value['id']."'>".$text.$value['name']."</option>";
                }

                $this->permissionDEQUY($parent_id, $value['id'], $text. '-');
            }
        }
        return $this -> htmlPermissionSelect;
    }
}
