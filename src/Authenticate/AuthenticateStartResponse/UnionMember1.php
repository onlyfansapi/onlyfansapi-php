<?php

declare(strict_types=1);

namespace OnlyFansAPI\Authenticate\AuthenticateStartResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * For mobile_app auth type — includes the session code to scan with the FansAPI Auth+ app.
 *
 * @phpstan-type UnionMember1Shape = array{
 *   attemptID?: string|null,
 *   message?: string|null,
 *   mobileAuthSessionDeeplink?: string|null,
 *   pollingURL?: string|null,
 * }
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<UnionMember1Shape> */
    use SdkModel;

    #[Optional('attempt_id')]
    public ?string $attemptID;

    #[Optional]
    public ?string $message;

    #[Optional('mobile_auth_session_deeplink')]
    public ?string $mobileAuthSessionDeeplink;

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
        ?string $mobileAuthSessionDeeplink = null,
        ?string $pollingURL = null,
    ): self {
        $self = new self;

        null !== $attemptID && $self['attemptID'] = $attemptID;
        null !== $message && $self['message'] = $message;
        null !== $mobileAuthSessionDeeplink && $self['mobileAuthSessionDeeplink'] = $mobileAuthSessionDeeplink;
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

    public function withMobileAuthSessionDeeplink(
        string $mobileAuthSessionDeeplink
    ): self {
        $self = clone $this;
        $self['mobileAuthSessionDeeplink'] = $mobileAuthSessionDeeplink;

        return $self;
    }

    public function withPollingURL(string $pollingURL): self
    {
        $self = clone $this;
        $self['pollingURL'] = $pollingURL;

        return $self;
    }
}
