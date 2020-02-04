<?php

namespace App\Models;

use \Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="events")
 */
class Event
{
    /** 
     * @ORM\Id * 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     */
    private $id;

    /** 
     * @ORM\Column(type="string") 
     */
    private $name;

    /** 
     * @ORM\Column(type="string") 
     */
    private $location;

    /** 
     * @ORM\Column(type="integer") 
     */
    private $price;

    /** 
     * @ORM\Column(type="datetime") 
     */
    private $date;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    
    public function __get($name)
    {
        return $this->$name;
    }

    public function __isset($name)
    {
        if(isset($this->$name)) {
            return true;
        } else {
            return false;
        }
    }
}
