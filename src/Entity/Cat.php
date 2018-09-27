<?php

class Cat
{
    private $id;
    private $name;
    private $race;
    private $behavior;
    private $weight;


    public function __construct(string $name, string $race, string $behavior, string $weight)
    {
        $this->name = $name;
        $this->race = $name;
        $this->behavior = $behavior;
        $this->weight = $weight;
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName($name)
    {
        return $this->name;
    }


    public function setRace(string $race)
    {
        $this->race = $race;
    }

    public function getRace($race)
    {
        return $this->race;
    }


    public function setBehavior(string $behavior)
    {
        $this->behavior = $behavior;
    }

    public function getBehavior($behavior)
    {
        return $this->behavior;
    }


    public function setWeight(string $weight)
    {
        $this->weight = $weight;
    }

    public function getWeight($weight)
    {
        return $this->weight;
    }
}
