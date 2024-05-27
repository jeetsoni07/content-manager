<?php
namespace App\Models\Fields;

use App\Models\Field;

class TextAreaField extends Field
{
    public function render()
    {
        return "<label for=\"{$this->name}\">{$this->label}</label>
                <textarea id=\"{$this->name}\" name=\"{$this->name}\">{$this->value}</textarea><br>";
    }
}
