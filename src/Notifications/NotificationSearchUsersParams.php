<?php

declare(strict_types=1);

namespace Onlyfansapi\Notifications;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Search users that have appeared in your notifications.
 *
 * @see Onlyfansapi\Services\NotificationsService::searchUsers()
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
