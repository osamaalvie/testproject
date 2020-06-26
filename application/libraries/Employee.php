<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05/06/2020
 * Time: 18:26
 */
class Employee
{
    private $name;
    private $age;

    public function __construct(Params $params)
    {
        $this->name = $params->getName();
        $this->age = $params->getAge();
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }


    public function __toString()
    {
        return "My name is " . $this->name . " and age is " . $this->age;
    }


    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return 1;
    }
}