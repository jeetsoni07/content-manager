<?php
namespace App\Models;

class Form
{
    private $fields = [];

    public function __construct($config)
    {
        foreach ($config as $fieldConfig) {
            $class = 'App\\Models\\Fields\\' . $fieldConfig['type'];
            if (class_exists($class)) {
                $this->fields[] = new $class($fieldConfig['name'], $fieldConfig['label'], $fieldConfig['value'] ?? '');
            }
        }
    }

    public function render()
    {
        $html = '<form method="POST">';
        foreach ($this->fields as $field) {
            $html .= $field->render();
        }
        $html .= '<input type="submit" value="Submit"></form>';
        return $html;
    }
}
