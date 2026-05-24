<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthenticateSend2faEmailResponseShape = array{
 *   message?: string|null, success?: bool|null
 * }
 */
final class AuthenticateSend2faEmailResponse implements BaseModel
{
    /** @use SdkModel<AuthenticateSend2faEmailResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $message;

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
        ?bool $success = null
    ): self {
        $self = new self;

        null !== $message && $self['message'] = $message;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
