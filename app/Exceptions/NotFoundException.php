<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function __construct(string $message = 'Không tìm thấy dữ liệu')
    {
        parent::__construct($message, 404);
    }
}
