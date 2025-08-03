<?php

namespace Muliacode\Resume\Enums;

enum EducationType: string
{
    case Secondary = "secondary";
    case HighSchool = "high_school";
    case Associate = "associate";
    case Bachelor = "bachelor";
    case Master = "master";
    case Doctorate = "doctorate";
    case Other = "other";
}
