<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember0;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{_1224114714?: list<int>|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<int>|null $_1224114714 */
    #[Optional('1224114714', list: 'int')]
    public ?array $_1224114714;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $_1224114714
     */
    public static function with(?array $_1224114714 = null): self
    {
        $self = new self;

        null !== $_1224114714 && $self['_1224114714'] = $_1224114714;

        return $self;
    }

    /**
     * @param list<int> $_1224114714
     */
    public function with1224114714(array $_1224114714): self
    {
        $self = clone $this;
        $self['_1224114714'] = $_1224114714;

        return $self;
    }
}
