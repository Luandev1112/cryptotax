<?php

namespace App\Models\Traits;

trait HasName
{
    public function getName(): ?string
    {
        return $this->name;
    }
}
