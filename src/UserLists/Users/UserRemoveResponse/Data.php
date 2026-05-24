<?php

declare(strict_types=1);

namespace Onlyfansapi\UserLists\Users\UserRemoveResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\UserLists\Users\UserRemoveResponse\Data\List_;
use Onlyfansapi\UserLists\Users\UserRemoveResponse\Data\UserState;

/**
 * @phpstan-import-type ListShape from \Onlyfansapi\UserLists\Users\UserRemoveResponse\Data\List_
 * @phpstan-import-type UserStateShape from \Onlyfansapi\UserLists\Users\UserRemoveResponse\Data\UserState
 *
 * @phpstan-type DataShape = array{
 *   list?: null|List_|ListShape, userState?: null|UserState|UserStateShape
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?List_ $list;

    #[Optional]
    public ?UserState $userState;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param List_|ListShape|null $list
     * @param UserState|UserStateShape|null $userState
     */
    public static function with(
        List_|array|null $list = null,
        UserState|array|null $userState = null
    ): self {
        $self = new self;

        null !== $list && $self['list'] = $list;
        null !== $userState && $self['userState'] = $userState;

        return $self;
    }

    /**
     * @param List_|ListShape $list
     */
    public function withList(List_|array $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }

    /**
     * @param UserState|UserStateShape $userState
     */
    public function withUserState(UserState|array $userState): self
    {
        $self = clone $this;
        $self['userState'] = $userState;

        return $self;
    }
}
