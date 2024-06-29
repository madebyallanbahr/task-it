<?php

namespace App\DTO;

use App\Interfaces\AbstractDTO;

class DTO implements AbstractDTO
{
    public function get_keys() {
        return get_object_vars($this);
    }

    public function toArray() : array
    {
        return $this->get_keys();
    }
}
