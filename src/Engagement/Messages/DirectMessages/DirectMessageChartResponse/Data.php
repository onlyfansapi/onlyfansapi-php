<?php

declare(strict_types=1);

namespace OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data\DirectMessages;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data\DirectMessagesPurchases;

/**
 * @phpstan-import-type DirectMessagesShape from \OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data\DirectMessages
 * @phpstan-import-type DirectMessagesPurchasesShape from \OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data\DirectMessagesPurchases
 *
 * @phpstan-type DataShape = array{
 *   directMessages?: null|DirectMessages|DirectMessagesShape,
 *   directMessagesPurchases?: null|DirectMessagesPurchases|DirectMessagesPurchasesShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('direct_messages')]
    public ?DirectMessages $directMessages;

    #[Optional('direct_messages_purchases')]
    public ?DirectMessagesPurchases $directMessagesPurchases;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DirectMessages|DirectMessagesShape|null $directMessages
     * @param DirectMessagesPurchases|DirectMessagesPurchasesShape|null $directMessagesPurchases
     */
    public static function with(
        DirectMessages|array|null $directMessages = null,
        DirectMessagesPurchases|array|null $directMessagesPurchases = null,
    ): self {
        $self = new self;

        null !== $directMessages && $self['directMessages'] = $directMessages;
        null !== $directMessagesPurchases && $self['directMessagesPurchases'] = $directMessagesPurchases;

        return $self;
    }

    /**
     * @param DirectMessages|DirectMessagesShape $directMessages
     */
    public function withDirectMessages(
        DirectMessages|array $directMessages
    ): self {
        $self = clone $this;
        $self['directMessages'] = $directMessages;

        return $self;
    }

    /**
     * @param DirectMessagesPurchases|DirectMessagesPurchasesShape $directMessagesPurchases
     */
    public function withDirectMessagesPurchases(
        DirectMessagesPurchases|array $directMessagesPurchases
    ): self {
        $self = clone $this;
        $self['directMessagesPurchases'] = $directMessagesPurchases;

        return $self;
    }
}
