<?php

namespace App\DTO;

use App\Interfaces\AbstractDTO;

abstract class DTO implements AbstractDTO
{
    private function get_keys(): array
    {
        return get_object_vars($this);
    }

    public function toArray() : array
    {
        return $this->get_keys();
    }
}
