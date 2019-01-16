<?php
/**
 * Created by PhpStorm.
 * User: quent
 * Date: 16/01/2019
 * Time: 14:47
 */

class Event
{
    private $id;
    private $title;
    private $content;
    private $date;

    // CONSTRUCTOR
    public function __construct(array $data){
        $this->hydrate($data);
    }

    // HYDRATATION
    public function hydrate(array $data){
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
                $this->method($value);
        }
    }

    // SETTERS
    public function setId($id){
        $id = (int) $id;

        if($id > 0)
            $this->id = $id;
    }
    public function setTitle($title){
        if (is_string($title))
           $this->title = $title;
    }

    public function setContent($content){
        if (is_string($content))
            $this->content = $content;
    }

    public function setDate($date){
        $this->date = $date;
    }

    // GETTERS
    public function id(){
        return $this->id;
    }

    public function title(){
        return $this->title;
    }

    public function content(){
        return $this->content;
    }

    public function date(){
        return $this->date;
    }

}