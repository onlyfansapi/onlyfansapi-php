<?php

declare(strict_types=1);

namespace OnlyFansAPI\Authenticate;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Submit the 2FA code, or Selfie Verification status, for the authentication process.
 *
 * @see OnlyFansAPI\Services\AuthenticateService::submit2fa()
 *
 * @phpstan-type AuthenticateSubmit2faParamsShape = array{
 *   code?: string|null, selfieVerificationCompleted?: mixed
 * }
 */
final class AuthenticateSubmit2faParams implements BaseModel
{
    /** @use SdkModel<AuthenticateSubmit2faParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The 2FA code you received on your phone. Must be empty if `selfie_verification_completed` is `true`.
     */
    #[Optional]
    public ?string $code;

    /**
     * This field is required when <code>code</code> is not present.
     */
    #[Optional('selfie_verification_completed')]
    public mixed $selfieVerificationCompleted;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $code = null,
        mixed $selfieVerificationCompleted = null
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $selfieVerificationCompleted && $self['selfieVerificationCompleted'] = $selfieVerificationCompleted;

        return $self;
    }

    /**
     * The 2FA code you received on your phone. Must be empty if `selfie_verification_completed` is `true`.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * This field is required when <code>code</code> is not present.
     */
    public function withSelfieVerificationCompleted(
        mixed $selfieVerificationCompleted
    ): self {
        $self = clone $this;
        $self['selfieVerificationCompleted'] = $selfieVerificationCompleted;

        return $self;
    }
}
