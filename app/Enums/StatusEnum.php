<?php

namespace App\Enums;

enum StatusEnum: string
{
    case IN_PROGRESS = "Em Andamento";
    case TO_REVIEW = "Em Revisão";
    case TO_PLANING = "Em Planejamento";
    case FINISHED = "Conclúido";
    case BLOCKED = "Bloqueado";
    case NONE = "N/A";
}
