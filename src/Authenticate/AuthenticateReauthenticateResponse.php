<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthenticateReauthenticateResponseShape = array{
 *   message?: string|null, pollingURL?: string|null, success?: bool|null
 * }
 */
final class AuthenticateReauthenticateResponse implements BaseModel
{
    /** @use SdkModel<AuthenticateReauthenticateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $message;

    #[Optional('polling_url')]
    public ?string $pollingURL;

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
        ?string $message = null,
        ?string $pollingURL = null,
        ?bool $success = null
    ): self {
        $self = new self;

        null !== $message && $self['message'] = $message;
        null !== $pollingURL && $self['pollingURL'] = $pollingURL;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withPollingURL(string $pollingURL): self
    {
        $self = clone $this;
        $self['pollingURL'] = $pollingURL;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
