<?php

namespace Modules\Shared\Enums;

enum Role: string
{
    case Founder = 'Founder';
    case CEO = 'CEO';
    case Director = 'Director';
    case HeadOfSTEM = 'Head of STEM';
    case Coaches = 'Coaches';
    case ITAdmins = 'IT Admins';
    case MarketingManagers = 'Marketing Managers';
    case SocialMediaManagers = 'Social Media Managers';
}

