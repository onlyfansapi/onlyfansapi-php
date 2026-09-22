<?php

declare(strict_types=1);

namespace OnlyFansAPI\Accounts\AccountListResponseItem\OnlyfansUserData;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type HasNewTicketRepliesShape = array{
 *   closed?: bool|null, open?: bool|null, solved?: bool|null
 * }
 */
final class HasNewTicketReplies implements BaseModel
{
    /** @use SdkModel<HasNewTicketRepliesShape> */
    use SdkModel;

    #[Optional]
    public ?bool $closed;

    #[Optional]
    public ?bool $open;

    #[Optional]
    public ?bool $solved;

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
        ?bool $closed = null,
        ?bool $open = null,
        ?bool $solved = null
    ): self {
        $self = new self;

        null !== $closed && $self['closed'] = $closed;
        null !== $open && $self['open'] = $open;
        null !== $solved && $self['solved'] = $solved;

        return $self;
    }

    public function withClosed(bool $closed): self
    {
        $self = clone $this;
        $self['closed'] = $closed;

        return $self;
    }

    public function withOpen(bool $open): self
    {
        $self = clone $this;
        $self['open'] = $open;

        return $self;
    }

    public function withSolved(bool $solved): self
    {
        $self = clone $this;
        $self['solved'] = $solved;

        return $self;
    }
}
