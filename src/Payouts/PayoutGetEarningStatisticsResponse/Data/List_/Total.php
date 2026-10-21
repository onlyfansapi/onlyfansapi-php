<?php

declare(strict_types=1);

namespace OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\All;
use OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\ChatMessages;
use OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\Post;
use OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\Subscribes;
use OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\Tips;

/**
 * @phpstan-import-type AllShape from \OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\All
 * @phpstan-import-type ChatMessagesShape from \OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\ChatMessages
 * @phpstan-import-type PostShape from \OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\Post
 * @phpstan-import-type SubscribesShape from \OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\Subscribes
 * @phpstan-import-type TipsShape from \OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total\Tips
 *
 * @phpstan-type TotalShape = array{
 *   all?: null|All|AllShape,
 *   chatMessages?: null|ChatMessages|ChatMessagesShape,
 *   post?: null|Post|PostShape,
 *   subscribes?: null|Subscribes|SubscribesShape,
 *   tips?: null|Tips|TipsShape,
 * }
 */
final class Total implements BaseModel
{
    /** @use SdkModel<TotalShape> */
    use SdkModel;

    #[Optional]
    public ?All $all;

    #[Optional('chat_messages')]
    public ?ChatMessages $chatMessages;

    #[Optional]
    public ?Post $post;

    #[Optional]
    public ?Subscribes $subscribes;

    #[Optional]
    public ?Tips $tips;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param All|AllShape|null $all
     * @param ChatMessages|ChatMessagesShape|null $chatMessages
     * @param Post|PostShape|null $post
     * @param Subscribes|SubscribesShape|null $subscribes
     * @param Tips|TipsShape|null $tips
     */
    public static function with(
        All|array|null $all = null,
        ChatMessages|array|null $chatMessages = null,
        Post|array|null $post = null,
        Subscribes|array|null $subscribes = null,
        Tips|array|null $tips = null,
    ): self {
        $self = new self;

        null !== $all && $self['all'] = $all;
        null !== $chatMessages && $self['chatMessages'] = $chatMessages;
        null !== $post && $self['post'] = $post;
        null !== $subscribes && $self['subscribes'] = $subscribes;
        null !== $tips && $self['tips'] = $tips;

        return $self;
    }

    /**
     * @param All|AllShape $all
     */
    public function withAll(All|array $all): self
    {
        $self = clone $this;
        $self['all'] = $all;

        return $self;
    }

    /**
     * @param ChatMessages|ChatMessagesShape $chatMessages
     */
    public function withChatMessages(ChatMessages|array $chatMessages): self
    {
        $self = clone $this;
        $self['chatMessages'] = $chatMessages;

        return $self;
    }

    /**
     * @param Post|PostShape $post
     */
    public function withPost(Post|array $post): self
    {
        $self = clone $this;
        $self['post'] = $post;

        return $self;
    }

    /**
     * @param Subscribes|SubscribesShape $subscribes
     */
    public function withSubscribes(Subscribes|array $subscribes): self
    {
        $self = clone $this;
        $self['subscribes'] = $subscribes;

        return $self;
    }

    /**
     * @param Tips|TipsShape $tips
     */
    public function withTips(Tips|array $tips): self
    {
        $self = clone $this;
        $self['tips'] = $tips;

        return $self;
    }
}
