<?php

namespace App\Entity;

class lego {
    public $id;
    public $name;
    public $collection;

    public function __construct($i, $n, $c) {
        $this->id = $i;
        $this->name = $n;
        $this->collection = $c;
    }

    

    /**
     * Get the value of id
     */ 
    public function getId() :int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName() :string
    {
        return $this->name;
    }

    /**
     * Get the value of collection
     */ 
    public function getCollection() :string
    {
        return $this->collection;
    }


}