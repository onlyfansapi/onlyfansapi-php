<?php

declare(strict_types=1);

namespace OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0\Data\List_;

/**
 * @phpstan-import-type ListShape from \OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0\Data\List_
 *
 * @phpstan-type DataShape = array{list?: list<List_|ListShape>|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<List_>|null $list */
    #[Optional(list: List_::class)]
    public ?array $list;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<List_|ListShape>|null $list
     */
    public static function with(?array $list = null): self
    {
        $self = new self;

        null !== $list && $self['list'] = $list;

        return $self;
    }

    /**
     * @param list<List_|ListShape> $list
     */
    public function withList(array $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }
}
