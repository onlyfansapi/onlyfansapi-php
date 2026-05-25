<?php

declare(strict_types=1);

namespace OnlyFansAPI\Authenticate\AuthenticateStartResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * For email_password or raw_data auth types.
 *
 * @phpstan-type UnionMember0Shape = array{
 *   attemptID?: string|null, message?: string|null, pollingURL?: string|null
 * }
 */
final class UnionMember0 implements BaseModel
{
    /** @use SdkModel<UnionMember0Shape> */
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
