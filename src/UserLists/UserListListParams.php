<?php

declare(strict_types=1);

namespace Onlyfansapi\UserLists;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get a list of OnlyFans Collections - User Lists.
 *
 * @see Onlyfansapi\Services\UserListsService::list()
 *
 * @phpstan-type UserListListParamsShape = array{
 *   limit?: int|null, offset?: int|null
 * }
 */
final class UserListListParams implements BaseModel
{
    /** @use SdkModel<UserListListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * How many results to return in the request. Max. 50 user lists. Must be at least 10. Must not be greater than 50.
     */
    #[Optional(nullable: true)]
    public ?int $limit;

    /**
     * Must be at least 0.
     */
    #[Optional(nullable: true)]
    public ?int $offset;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $limit = null, ?int $offset = null): self
    {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * How many results to return in the request. Max. 50 user lists. Must be at least 10. Must not be greater than 50.
     */
    public function withLimit(?int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Must be at least 0.
     */
    public function withOffset(?int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
