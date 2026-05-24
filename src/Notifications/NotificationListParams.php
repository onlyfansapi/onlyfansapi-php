<?php

declare(strict_types=1);

namespace Onlyfansapi\Notifications;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Notifications\NotificationListParams\SkipUsers;
use Onlyfansapi\Notifications\NotificationListParams\Type;

/**
 * List all notifications for the account.
 *
 * @see Onlyfansapi\Services\NotificationsService::list()
 *
 * @phpstan-type NotificationListParamsShape = array{
 *   fromID?: int|null,
 *   limit?: int|null,
 *   skipUsers?: null|SkipUsers|value-of<SkipUsers>,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class NotificationListParams implements BaseModel
{
    /** @use SdkModel<NotificationListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Used for pagination. This value should be the ID of the previous response's last notification.
     */
    #[Optional]
    public ?int $fromID;

    /**
     * The number of notifications. Default `10`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Whether to skip user details. Default `all`.
     *
     * @var value-of<SkipUsers>|null $skipUsers
     */
    #[Optional(enum: SkipUsers::class)]
    public ?string $skipUsers;

    /**
     * Filter notifications by a specific type.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SkipUsers|value-of<SkipUsers>|null $skipUsers
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?int $fromID = null,
        ?int $limit = null,
        SkipUsers|string|null $skipUsers = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $fromID && $self['fromID'] = $fromID;
        null !== $limit && $self['limit'] = $limit;
        null !== $skipUsers && $self['skipUsers'] = $skipUsers;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Used for pagination. This value should be the ID of the previous response's last notification.
     */
    public function withFromID(int $fromID): self
    {
        $self = clone $this;
        $self['fromID'] = $fromID;

        return $self;
    }

    /**
     * The number of notifications. Default `10`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Whether to skip user details. Default `all`.
     *
     * @param SkipUsers|value-of<SkipUsers> $skipUsers
     */
    public function withSkipUsers(SkipUsers|string $skipUsers): self
    {
        $self = clone $this;
        $self['skipUsers'] = $skipUsers;

        return $self;
    }

    /**
     * Filter notifications by a specific type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
