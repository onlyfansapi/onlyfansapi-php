<?php

declare(strict_types=1);

namespace OnlyFansAPI\Notifications\NotificationGetCountsResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   all?: int|null,
 *   commented?: int|null,
 *   deactivatedMedia?: int|null,
 *   favorited?: int|null,
 *   mentioned?: int|null,
 *   message?: int|null,
 *   purchases?: int|null,
 *   subscribed?: int|null,
 *   system?: int|null,
 *   tags?: int|null,
 *   tip?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $all;

    #[Optional]
    public ?int $commented;

    #[Optional('deactivated_media')]
    public ?int $deactivatedMedia;

    #[Optional]
    public ?int $favorited;

    #[Optional]
    public ?int $mentioned;

    #[Optional]
    public ?int $message;

    #[Optional]
    public ?int $purchases;

    #[Optional]
    public ?int $subscribed;

    #[Optional]
    public ?int $system;

    #[Optional]
    public ?int $tags;

    #[Optional]
    public ?int $tip;

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
        ?int $all = null,
        ?int $commented = null,
        ?int $deactivatedMedia = null,
        ?int $favorited = null,
        ?int $mentioned = null,
        ?int $message = null,
        ?int $purchases = null,
        ?int $subscribed = null,
        ?int $system = null,
        ?int $tags = null,
        ?int $tip = null,
    ): self {
        $self = new self;

        null !== $all && $self['all'] = $all;
        null !== $commented && $self['commented'] = $commented;
        null !== $deactivatedMedia && $self['deactivatedMedia'] = $deactivatedMedia;
        null !== $favorited && $self['favorited'] = $favorited;
        null !== $mentioned && $self['mentioned'] = $mentioned;
        null !== $message && $self['message'] = $message;
        null !== $purchases && $self['purchases'] = $purchases;
        null !== $subscribed && $self['subscribed'] = $subscribed;
        null !== $system && $self['system'] = $system;
        null !== $tags && $self['tags'] = $tags;
        null !== $tip && $self['tip'] = $tip;

        return $self;
    }

    public function withAll(int $all): self
    {
        $self = clone $this;
        $self['all'] = $all;

        return $self;
    }

    public function withCommented(int $commented): self
    {
        $self = clone $this;
        $self['commented'] = $commented;

        return $self;
    }

    public function withDeactivatedMedia(int $deactivatedMedia): self
    {
        $self = clone $this;
        $self['deactivatedMedia'] = $deactivatedMedia;

        return $self;
    }

    public function withFavorited(int $favorited): self
    {
        $self = clone $this;
        $self['favorited'] = $favorited;

        return $self;
    }

    public function withMentioned(int $mentioned): self
    {
        $self = clone $this;
        $self['mentioned'] = $mentioned;

        return $self;
    }

    public function withMessage(int $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withPurchases(int $purchases): self
    {
        $self = clone $this;
        $self['purchases'] = $purchases;

        return $self;
    }

    public function withSubscribed(int $subscribed): self
    {
        $self = clone $this;
        $self['subscribed'] = $subscribed;

        return $self;
    }

    public function withSystem(int $system): self
    {
        $self = clone $this;
        $self['system'] = $system;

        return $self;
    }

    public function withTags(int $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    public function withTip(int $tip): self
    {
        $self = clone $this;
        $self['tip'] = $tip;

        return $self;
    }
}
