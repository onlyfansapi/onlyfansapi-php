<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\UserLists\UserListListParams\View;

/**
 * Get a list of OnlyFans Collections - User Lists. If you only want to get User Lists available for sending a Mass-Message, use `?view=queue`.
 *
 * @see OnlyFansAPI\Services\UserListsService::list()
 *
 * @phpstan-type UserListListParamsShape = array{
 *   limit?: int|null, offset?: int|null, view?: null|View|value-of<View>
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

    /**
     * How to return the results. `queue` returns the user lists that are available for Mass-Messaging.
     *
     * @var value-of<View>|null $view
     */
    #[Optional(enum: View::class)]
    public ?string $view;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param View|value-of<View>|null $view
     */
    public static function with(
        ?int $limit = null,
        ?int $offset = null,
        View|string|null $view = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $view && $self['view'] = $view;

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

    /**
     * How to return the results. `queue` returns the user lists that are available for Mass-Messaging.
     *
     * @param View|value-of<View> $view
     */
    public function withView(View|string $view): self
    {
        $self = clone $this;
        $self['view'] = $view;

        return $self;
    }
}
