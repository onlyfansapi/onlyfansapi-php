<?php

declare(strict_types=1);

namespace OnlyFansAPI\Authenticate;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthenticateSubmit2faResponseShape = array{message?: string|null}
 */
final class AuthenticateSubmit2faResponse implements BaseModel
{
    /** @use SdkModel<AuthenticateSubmit2faResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $message;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $message = null): self
    {
        $self = new self;

        null !== $message && $self['message'] = $message;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }
}
