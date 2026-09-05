<?php

declare(strict_types=1);

namespace OnlyFansAPI\Notifications;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Search users that have appeared in your notifications.
 *
 * @see OnlyFansAPI\Services\NotificationsService::searchUsers()
 *
 * @phpstan-type NotificationSearchUsersParamsShape = array{query: string}
 */
final class NotificationSearchUsersParams implements BaseModel
{
    /** @use SdkModel<NotificationSearchUsersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The query to search for. Can be either a name or username.
     */
    #[Required]
    public string $query;

    /**
     * `new NotificationSearchUsersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotificationSearchUsersParams::with(query: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotificationSearchUsersParams)->withQuery(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $query): self
    {
        $self = new self;

        $self['query'] = $query;

        return $self;
    }

    /**
     * The query to search for. Can be either a name or username.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }
}
