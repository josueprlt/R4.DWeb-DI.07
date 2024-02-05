<?php

namespace App\Entity;

class lego {
    public $id;
    public $name;
    public $collection;
    public $price;
    public $pieces;
    public $description;
    public $boxImage;
    public $legoImage;

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



    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set the value of pieces
     *
     * @return  self
     */ 
    public function setPieces($pieces)
    {
        $this->pieces = $pieces;

        return $this;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the value of boxImage
     *
     * @return  self
     */ 
    public function setBoxImage($boxImage)
    {
        $this->boxImage = $boxImage;

        return $this;
    }

    /**
     * Set the value of legoImage
     *
     * @return  self
     */ 
    public function setLegoImage($legoImage)
    {
        $this->legoImage = $legoImage;

        return $this;
    }
}