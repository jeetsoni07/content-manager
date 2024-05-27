<?php
namespace App\Models;

abstract class Field
{
    protected $name;
    protected $label;
    protected $value;

    public function __construct($name, $label, $value = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }

    abstract public function render();
}
