<?php
namespace App\Models\Fields;

use App\Models\Field;

class TextInput extends Field
{
    public function render()
    {
        return "<label for=\"{$this->name}\">{$this->label}</label>
                <input type=\"text\" id=\"{$this->name}\" name=\"{$this->name}\" value=\"{$this->value}\"><br>";
    }
}
