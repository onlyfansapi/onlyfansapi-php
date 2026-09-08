<?php

declare(strict_types=1);

namespace OnlyFansAPI\Authenticate\AuthenticatePollStatusResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type LastAttemptShape = array{
 *   completedAt?: string|null,
 *   errorCode?: string|null,
 *   errorMessage?: string|null,
 *   needsOtp?: bool|null,
 *   otpPhoneEnding?: string|null,
 *   startedAt?: string|null,
 *   success?: bool|null,
 * }
 */
final class LastAttempt implements BaseModel
{
    /** @use SdkModel<LastAttemptShape> */
    use SdkModel;

    #[Optional('completed_at')]
    public ?string $completedAt;

    #[Optional('error_code', nullable: true)]
    public ?string $errorCode;

    #[Optional('error_message', nullable: true)]
    public ?string $errorMessage;

    #[Optional('needs_otp')]
    public ?bool $needsOtp;

    #[Optional('otp_phone_ending', nullable: true)]
    public ?string $otpPhoneEnding;

    #[Optional('started_at')]
    public ?string $startedAt;

    #[Optional]
    public ?bool $success;

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
        ?string $completedAt = null,
        ?string $errorCode = null,
        ?string $errorMessage = null,
        ?bool $needsOtp = null,
        ?string $otpPhoneEnding = null,
        ?string $startedAt = null,
        ?bool $success = null,
    ): self {
        $self = new self;

        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $errorCode && $self['errorCode'] = $errorCode;
        null !== $errorMessage && $self['errorMessage'] = $errorMessage;
        null !== $needsOtp && $self['needsOtp'] = $needsOtp;
        null !== $otpPhoneEnding && $self['otpPhoneEnding'] = $otpPhoneEnding;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    public function withCompletedAt(string $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    public function withErrorCode(?string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    public function withErrorMessage(?string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }

    public function withNeedsOtp(bool $needsOtp): self
    {
        $self = clone $this;
        $self['needsOtp'] = $needsOtp;

        return $self;
    }

    public function withOtpPhoneEnding(?string $otpPhoneEnding): self
    {
        $self = clone $this;
        $self['otpPhoneEnding'] = $otpPhoneEnding;

        return $self;
    }

    public function withStartedAt(string $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
