<?php
/**
 * Created by PhpStorm.
 * User: quent
 * Date: 16/01/2019
 * Time: 14:39
 */

class EventManager extends Model
{
    public function getEvent(){
        return $this->getAll('events', 'Event');
    }
}