<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListShape = array{rejectReason?: string|null, state?: string|null}
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $rejectReason;

    #[Optional]
    public ?string $state;

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
        ?string $rejectReason = null,
        ?string $state = null
    ): self {
        $self = new self;

        null !== $rejectReason && $self['rejectReason'] = $rejectReason;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    public function withRejectReason(?string $rejectReason): self
    {
        $self = clone $this;
        $self['rejectReason'] = $rejectReason;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
