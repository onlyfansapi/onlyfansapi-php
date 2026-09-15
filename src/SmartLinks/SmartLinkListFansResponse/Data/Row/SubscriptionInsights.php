<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListFansResponse\Data\Row;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinks\SmartLinkListFansResponse\Data\Row\SubscriptionInsights\CurrentSubscription;

/**
 * @phpstan-import-type CurrentSubscriptionShape from \OnlyFansAPI\SmartLinks\SmartLinkListFansResponse\Data\Row\SubscriptionInsights\CurrentSubscription
 *
 * @phpstan-type SubscriptionInsightsShape = array{
 *   currentSubscription?: null|CurrentSubscription|CurrentSubscriptionShape,
 *   currentSubscriptionFromSmartLink?: bool|null,
 *   hasSubscriptionData?: bool|null,
 *   previouslySubscribed?: bool|null,
 *   subscribedUsingPromo?: bool|null,
 * }
 */
final class SubscriptionInsights implements BaseModel
{
    /** @use SdkModel<SubscriptionInsightsShape> */
    use SdkModel;

    #[Optional('current_subscription')]
    public ?CurrentSubscription $currentSubscription;

    #[Optional('current_subscription_from_smart_link')]
    public ?bool $currentSubscriptionFromSmartLink;

    #[Optional('has_subscription_data')]
    public ?bool $hasSubscriptionData;

    #[Optional('previously_subscribed')]
    public ?bool $previouslySubscribed;

    #[Optional('subscribed_using_promo')]
    public ?bool $subscribedUsingPromo;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CurrentSubscription|CurrentSubscriptionShape|null $currentSubscription
     */
    public static function with(
        CurrentSubscription|array|null $currentSubscription = null,
        ?bool $currentSubscriptionFromSmartLink = null,
        ?bool $hasSubscriptionData = null,
        ?bool $previouslySubscribed = null,
        ?bool $subscribedUsingPromo = null,
    ): self {
        $self = new self;

        null !== $currentSubscription && $self['currentSubscription'] = $currentSubscription;
        null !== $currentSubscriptionFromSmartLink && $self['currentSubscriptionFromSmartLink'] = $currentSubscriptionFromSmartLink;
        null !== $hasSubscriptionData && $self['hasSubscriptionData'] = $hasSubscriptionData;
        null !== $previouslySubscribed && $self['previouslySubscribed'] = $previouslySubscribed;
        null !== $subscribedUsingPromo && $self['subscribedUsingPromo'] = $subscribedUsingPromo;

        return $self;
    }

    /**
     * @param CurrentSubscription|CurrentSubscriptionShape $currentSubscription
     */
    public function withCurrentSubscription(
        CurrentSubscription|array $currentSubscription
    ): self {
        $self = clone $this;
        $self['currentSubscription'] = $currentSubscription;

        return $self;
    }

    public function withCurrentSubscriptionFromSmartLink(
        bool $currentSubscriptionFromSmartLink
    ): self {
        $self = clone $this;
        $self['currentSubscriptionFromSmartLink'] = $currentSubscriptionFromSmartLink;

        return $self;
    }

    public function withHasSubscriptionData(bool $hasSubscriptionData): self
    {
        $self = clone $this;
        $self['hasSubscriptionData'] = $hasSubscriptionData;

        return $self;
    }

    public function withPreviouslySubscribed(bool $previouslySubscribed): self
    {
        $self = clone $this;
        $self['previouslySubscribed'] = $previouslySubscribed;

        return $self;
    }

    public function withSubscribedUsingPromo(bool $subscribedUsingPromo): self
    {
        $self = clone $this;
        $self['subscribedUsingPromo'] = $subscribedUsingPromo;

        return $self;
    }
}
