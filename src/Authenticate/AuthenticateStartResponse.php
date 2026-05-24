<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthenticateStartResponseShape = array{
 *   attemptID?: string|null, message?: string|null, pollingURL?: string|null
 * }
 */
final class AuthenticateStartResponse implements BaseModel
{
    /** @use SdkModel<AuthenticateStartResponseShape> */
    use SdkModel;

    #[Optional('attempt_id')]
    public ?string $attemptID;

    #[Optional]
    public ?string $message;

    #[Optional('polling_url')]
    public ?string $pollingURL;

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
        ?string $attemptID = null,
        ?string $message = null,
        ?string $pollingURL = null
    ): self {
        $self = new self;

        null !== $attemptID && $self['attemptID'] = $attemptID;
        null !== $message && $self['message'] = $message;
        null !== $pollingURL && $self['pollingURL'] = $pollingURL;

        return $self;
    }

    public function withAttemptID(string $attemptID): self
    {
        $self = clone $this;
        $self['attemptID'] = $attemptID;

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
}
