<?php

namespace App\Exceptions;

use Exception;

class EntityNotFoundException extends Exception
{
    protected $message = 'Entity Not Found';
}
