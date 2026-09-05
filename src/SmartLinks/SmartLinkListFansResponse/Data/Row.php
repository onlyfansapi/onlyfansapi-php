<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListFansResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinks\SmartLinkListFansResponse\Data\Row\SubscriptionInsights;

/**
 * @phpstan-import-type SubscriptionInsightsShape from \OnlyFansAPI\SmartLinks\SmartLinkListFansResponse\Data\Row\SubscriptionInsights
 *
 * @phpstan-type RowShape = array{
 *   avatarURL?: string|null,
 *   clickID?: string|null,
 *   conversionID?: int|null,
 *   convertedAt?: string|null,
 *   externalClickID?: string|null,
 *   fanID?: int|null,
 *   messagesSentByFan?: int|null,
 *   name?: string|null,
 *   onlyfansID?: string|null,
 *   revenueNet?: int|null,
 *   subscriptionInsights?: null|SubscriptionInsights|SubscriptionInsightsShape,
 *   tipsNet?: int|null,
 *   username?: string|null,
 * }
 */
final class Row implements BaseModel
{
    /** @use SdkModel<RowShape> */
    use SdkModel;

    #[Optional('avatar_url')]
    public ?string $avatarURL;

    #[Optional('click_id')]
    public ?string $clickID;

    #[Optional('conversion_id')]
    public ?int $conversionID;

    #[Optional('converted_at')]
    public ?string $convertedAt;

    #[Optional('external_click_id')]
    public ?string $externalClickID;

    #[Optional('fan_id')]
    public ?int $fanID;

    #[Optional('messages_sent_by_fan')]
    public ?int $messagesSentByFan;

    #[Optional]
    public ?string $name;

    #[Optional('onlyfans_id')]
    public ?string $onlyfansID;

    #[Optional('revenue_net')]
    public ?int $revenueNet;

    #[Optional('subscription_insights')]
    public ?SubscriptionInsights $subscriptionInsights;

    #[Optional('tips_net')]
    public ?int $tipsNet;

    #[Optional]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SubscriptionInsights|SubscriptionInsightsShape|null $subscriptionInsights
     */
    public static function with(
        ?string $avatarURL = null,
        ?string $clickID = null,
        ?int $conversionID = null,
        ?string $convertedAt = null,
        ?string $externalClickID = null,
        ?int $fanID = null,
        ?int $messagesSentByFan = null,
        ?string $name = null,
        ?string $onlyfansID = null,
        ?int $revenueNet = null,
        SubscriptionInsights|array|null $subscriptionInsights = null,
        ?int $tipsNet = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $avatarURL && $self['avatarURL'] = $avatarURL;
        null !== $clickID && $self['clickID'] = $clickID;
        null !== $conversionID && $self['conversionID'] = $conversionID;
        null !== $convertedAt && $self['convertedAt'] = $convertedAt;
        null !== $externalClickID && $self['externalClickID'] = $externalClickID;
        null !== $fanID && $self['fanID'] = $fanID;
        null !== $messagesSentByFan && $self['messagesSentByFan'] = $messagesSentByFan;
        null !== $name && $self['name'] = $name;
        null !== $onlyfansID && $self['onlyfansID'] = $onlyfansID;
        null !== $revenueNet && $self['revenueNet'] = $revenueNet;
        null !== $subscriptionInsights && $self['subscriptionInsights'] = $subscriptionInsights;
        null !== $tipsNet && $self['tipsNet'] = $tipsNet;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    public function withAvatarURL(string $avatarURL): self
    {
        $self = clone $this;
        $self['avatarURL'] = $avatarURL;

        return $self;
    }

    public function withClickID(string $clickID): self
    {
        $self = clone $this;
        $self['clickID'] = $clickID;

        return $self;
    }

    public function withConversionID(int $conversionID): self
    {
        $self = clone $this;
        $self['conversionID'] = $conversionID;

        return $self;
    }

    public function withConvertedAt(string $convertedAt): self
    {
        $self = clone $this;
        $self['convertedAt'] = $convertedAt;

        return $self;
    }

    public function withExternalClickID(string $externalClickID): self
    {
        $self = clone $this;
        $self['externalClickID'] = $externalClickID;

        return $self;
    }

    public function withFanID(int $fanID): self
    {
        $self = clone $this;
        $self['fanID'] = $fanID;

        return $self;
    }

    public function withMessagesSentByFan(int $messagesSentByFan): self
    {
        $self = clone $this;
        $self['messagesSentByFan'] = $messagesSentByFan;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOnlyfansID(string $onlyfansID): self
    {
        $self = clone $this;
        $self['onlyfansID'] = $onlyfansID;

        return $self;
    }

    public function withRevenueNet(int $revenueNet): self
    {
        $self = clone $this;
        $self['revenueNet'] = $revenueNet;

        return $self;
    }

    /**
     * @param SubscriptionInsights|SubscriptionInsightsShape $subscriptionInsights
     */
    public function withSubscriptionInsights(
        SubscriptionInsights|array $subscriptionInsights
    ): self {
        $self = clone $this;
        $self['subscriptionInsights'] = $subscriptionInsights;

        return $self;
    }

    public function withTipsNet(int $tipsNet): self
    {
        $self = clone $this;
        $self['tipsNet'] = $tipsNet;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
