<?php

namespace App\Enums;

enum PriorityEnum: string
{
    case LOW = "Baixa";
    case MEDIUM = "Média";
    case HIGH = "Alta";
    case NONE = "N/A";
}
