<?php

declare(strict_types=1);

namespace Onlyfansapi\Notifications\TabsOrder;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Update the order of an account's notification tabs as displayed on the OnlyFans notifications page.
 *
 * @see Onlyfansapi\Services\Notifications\TabsOrderService::update()
 *
 * @phpstan-type TabsOrderUpdateParamsShape = array{tabs: list<string>}
 */
final class TabsOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<TabsOrderUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of tab keys. Must include exactly these: all, subscriptions, onlyfans, purchases, tips, tags, comments, mentions, likes, promotions.
     *
     * @var list<string> $tabs
     */
    #[Required(list: 'string')]
    public array $tabs;

    /**
     * `new TabsOrderUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TabsOrderUpdateParams::with(tabs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TabsOrderUpdateParams)->withTabs(...)
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
     *
     * @param list<string> $tabs
     */
    public static function with(array $tabs): self
    {
        $self = new self;

        $self['tabs'] = $tabs;

        return $self;
    }

    /**
     * Array of tab keys. Must include exactly these: all, subscriptions, onlyfans, purchases, tips, tags, comments, mentions, likes, promotions.
     *
     * @param list<string> $tabs
     */
    public function withTabs(array $tabs): self
    {
        $self = clone $this;
        $self['tabs'] = $tabs;

        return $self;
    }
}
