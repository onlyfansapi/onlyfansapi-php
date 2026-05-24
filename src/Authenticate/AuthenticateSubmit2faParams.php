<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Submit the 2FA code for the authentication process.
 *
 * @see Onlyfansapi\Services\AuthenticateService::submit2fa()
 *
 * @phpstan-type AuthenticateSubmit2faParamsShape = array{code: string}
 */
final class AuthenticateSubmit2faParams implements BaseModel
{
    /** @use SdkModel<AuthenticateSubmit2faParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The 2FA code you received on your phone.
     */
    #[Required]
    public string $code;

    /**
     * `new AuthenticateSubmit2faParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthenticateSubmit2faParams::with(code: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthenticateSubmit2faParams)->withCode(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $code): self
    {
        $self = new self;

        $self['code'] = $code;

        return $self;
    }

    /**
     * The 2FA code you received on your phone.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }
}
