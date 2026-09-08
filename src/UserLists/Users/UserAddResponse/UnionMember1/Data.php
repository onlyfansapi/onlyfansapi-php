<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember1;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember1\Data\Failed;

/**
 * @phpstan-import-type FailedShape from \OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember1\Data\Failed
 *
 * @phpstan-type DataShape = array{
 *   added?: list<int>|null, failed?: null|Failed|FailedShape
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<int>|null $added */
    #[Optional(list: 'int')]
    public ?array $added;

    #[Optional]
    public ?Failed $failed;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $added
     * @param Failed|FailedShape|null $failed
     */
    public static function with(
        ?array $added = null,
        Failed|array|null $failed = null
    ): self {
        $self = new self;

        null !== $added && $self['added'] = $added;
        null !== $failed && $self['failed'] = $failed;

        return $self;
    }

    /**
     * @param list<int> $added
     */
    public function withAdded(array $added): self
    {
        $self = clone $this;
        $self['added'] = $added;

        return $self;
    }

    /**
     * @param Failed|FailedShape $failed
     */
    public function withFailed(Failed|array $failed): self
    {
        $self = clone $this;
        $self['failed'] = $failed;

        return $self;
    }
}
