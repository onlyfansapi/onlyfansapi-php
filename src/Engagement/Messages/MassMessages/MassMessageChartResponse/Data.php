<?php

declare(strict_types=1);

namespace Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse\Data\GroupMessages;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse\Data\GroupMessagesPurchases;

/**
 * @phpstan-import-type GroupMessagesShape from \Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse\Data\GroupMessages
 * @phpstan-import-type GroupMessagesPurchasesShape from \Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse\Data\GroupMessagesPurchases
 *
 * @phpstan-type DataShape = array{
 *   groupMessages?: null|GroupMessages|GroupMessagesShape,
 *   groupMessagesPurchases?: null|GroupMessagesPurchases|GroupMessagesPurchasesShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('group_messages')]
    public ?GroupMessages $groupMessages;

    #[Optional('group_messages_purchases')]
    public ?GroupMessagesPurchases $groupMessagesPurchases;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GroupMessages|GroupMessagesShape|null $groupMessages
     * @param GroupMessagesPurchases|GroupMessagesPurchasesShape|null $groupMessagesPurchases
     */
    public static function with(
        GroupMessages|array|null $groupMessages = null,
        GroupMessagesPurchases|array|null $groupMessagesPurchases = null,
    ): self {
        $self = new self;

        null !== $groupMessages && $self['groupMessages'] = $groupMessages;
        null !== $groupMessagesPurchases && $self['groupMessagesPurchases'] = $groupMessagesPurchases;

        return $self;
    }

    /**
     * @param GroupMessages|GroupMessagesShape $groupMessages
     */
    public function withGroupMessages(GroupMessages|array $groupMessages): self
    {
        $self = clone $this;
        $self['groupMessages'] = $groupMessages;

        return $self;
    }

    /**
     * @param GroupMessagesPurchases|GroupMessagesPurchasesShape $groupMessagesPurchases
     */
    public function withGroupMessagesPurchases(
        GroupMessagesPurchases|array $groupMessagesPurchases
    ): self {
        $self = clone $this;
        $self['groupMessagesPurchases'] = $groupMessagesPurchases;

        return $self;
    }
}
