<?php

namespace App\Controller;

class Homepage
{
    public function home()
    {
        return [
            'success' => true,
            'message' => 'l\'API est accessible',
        ];
    }
}
