<?php

declare(strict_types=1);

namespace Onlyfansapi\MassMessaging\MassMessagingGetOverviewResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\MassMessaging\MassMessagingGetOverviewResponse\Data\Item;

/**
 * @phpstan-import-type ItemShape from \Onlyfansapi\MassMessaging\MassMessagingGetOverviewResponse\Data\Item
 *
 * @phpstan-type DataShape = array{
 *   hasMore?: bool|null, items?: list<Item|ItemShape>|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $hasMore;

    /** @var list<Item>|null $items */
    #[Optional(list: Item::class)]
    public ?array $items;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Item|ItemShape>|null $items
     */
    public static function with(?bool $hasMore = null, ?array $items = null): self
    {
        $self = new self;

        null !== $hasMore && $self['hasMore'] = $hasMore;
        null !== $items && $self['items'] = $items;

        return $self;
    }

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    /**
     * @param list<Item|ItemShape> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }
}
