<?php

namespace App\Components;


use App\Category;

class Recusive
{
    private $data;
    private $htmlCategorySelect = '';
    public function __construct($data)
    {
        $this ->data = $data;
    }
    public function categoryDEQUY ($parent_id, $id = 0, $text =''){
//        $data = Category::all();
        foreach ($this -> data as $value){
            if ($value['parent_id'] == $id){
                if( !empty($parent_id) && $parent_id == $value['id'] ){
                    $this ->htmlCategorySelect .= "<option selected value='".$value['id']."'>".$text.$value['name']."</option>";
                }else{
                    $this ->htmlCategorySelect .= "<option value='".$value['id']."'>".$text.$value['name']."</option>";
                }

                $this->categoryDEQUY($parent_id, $value['id'], $text. '-');
            }
        }
        return $this -> htmlCategorySelect;
    }
    public function categoryDEQUYleve1 ($parent_id){
        $catenews = array();
        foreach ($this -> data as $value){
            $value = $value -> id;
            array_push($catenews, $value);
        }
        return $catenews;
//        dd($catenews);
    }
    public function categoryDEQUYleve2 ($parent_id){
        $catenews = array();
        foreach ($this -> data as $value){
            $value = $value -> id;
            array_push($catenews, $value);
        }
        return $catenews;
//        dd($catenews);
    }
}
