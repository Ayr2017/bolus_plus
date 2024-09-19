<?php

namespace App\Enums\Field;

enum FieldTypeEnum:string
{
    case text = 'text';
    case textarea = 'textarea';
    case date = 'date';
    case datetimelocal = 'datetime-local';
    case number = 'number';
    case select = 'select';
}
