<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate\AuthenticateStartParams;

/**
 * The authentication method to use. Defaults to `email_password` if omitted. Use `mobile_app` to authenticate via the FansAPI Auth+ mobile app (no credential fields required).
 */
enum AuthType: string
{
    case EMAIL_PASSWORD = 'email_password';

    case RAW_DATA = 'raw_data';

    case MOBILE_APP = 'mobile_app';
}
