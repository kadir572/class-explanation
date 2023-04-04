<?php

// Here I will explain how a class works

// To create a class, use the keyword 'class' followed by its name. The convention is to write the class name uppercase. If it is a file, the file name should also be capital.

// A class is imply a blueprint for an object that can be created with the keyword new. The created object is called an instance of a class.

// A class can have optional variables and functions (static or non static).

  // Non static variables and functions are used with instances of the class, which are created with the keyword new.

  // Static variables and functions on the other hand can be used wwithout the need to instantiate the class.

  // To understand this better, imagine a function sayName() that prints the name of the instantiated animal. This function makes only sense with an animal instance.

  // But imagine a function that prints the amount of animals created. This function doesn't make sense to be called on an instance of class, but rather to be able to be called without the need to instantiate it.

  // There are public and private variables and functions. 

  // Public variables and functions can be called from the instantiated objects or from the object itself if static.

  // Private variables and functions can only be used within the class by other variables and functions.

class Animal {

  // this is a private static variable.
  // private so it can only be called from within the class
  // static so it can be used in a static function
  // this variable is static so it does not belong to any instantiated object, but rather to the class itself
  private static $count = 0;

  // this is a private non static variable (non static so it is for instantiated objects)
  // private so it cannot be accessed directly from the instantiated class. Because that way it could be changed accidentally.
  private $name = '';

  // This is a constructor, wwhich is a function which will be automatically called when a new object from this class is instantiated
  // it has a required parameter $name
  function __construct($name) {
    
    // The required parameter is used to set the name of instantiated animal
    $this->name = $name;
    // here the addAnimal function is automatically called to increase the animal count by 1
    self::addAnimal();
  }

  // this is a public static function.
  // public so it can be called from outside the class
  // static so it can be called without the need to instantiate a new object from the class
  // used like this Animal::printCount();
  public static function printCount() {
    echo self::$count;
  }

  // this is a private static function
  // private so it cannot be accessed from ouside the class
  // static so it does not belong to an instance of the class, but rather to the class itself
  private static function addAnimal() {
    // increases the value of $count by 1
    ++self::$count;
  }

  // this is a public non static function
  // public so it can be called from outside the class
  // non static so it can be called from an instantiated object of the class like this
  // $tom = new Animal('Tom');
  // $tom->sayName();
  // prints 'Tom';
  public function sayName() {
    echo $this->name;
  }
}

// creates a new animal called Tom
$tom = new Animal('Tom');
// creates a new animal called Tim
$tim = new Animal('Tim');
// this is how to call a non static function (a function that belongs to an instantiated object)
// prints the name of the object $tom, which is Tom
$tom->sayName();
// this is how to call a static function of the class
// prints the amount of animals instantiated
Animal::printCount();
