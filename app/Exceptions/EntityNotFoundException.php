<?php

namespace App\Exceptions;

use Exception;

class EntityNotFoundException extends Exception
{
    public function render()
    {
        $json = [
            'success' => false,
            'error' => $this->getMessage(),
        ];

        return response()->json($json);
    }
}
