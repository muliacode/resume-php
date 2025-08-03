<?php

declare(strict_types=1);

namespace Muliacode\Resume\Enums;

enum EducationType: string
{
    case Secondary = "Secondary";
    case HighSchool = "High School";
    case Associate = "Associate";
    case Bachelor = "Bachelor";
    case Master = "Master";
    case Doctorate = "Doctorate";
    case Other = "Other";
}
