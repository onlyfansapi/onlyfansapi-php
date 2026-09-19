<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinks\SmartLinkCreateParams\LinkType;

/**
 * Create a new Smart Link for the account. Smart Links are pooled Free Trial or Tracking links that rotate inventory automatically.
 *
 * @see OnlyFansAPI\Services\SmartLinksService::create()
 *
 * @phpstan-type SmartLinkCreateParamsShape = array{
 *   accountID: string,
 *   linkType: LinkType|value-of<LinkType>,
 *   name: string,
 *   freeTrialDays?: int|null,
 * }
 */
final class SmartLinkCreateParams implements BaseModel
{
    /** @use SdkModel<SmartLinkCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The prefixed ID of the account to create the Smart Link for.
     */
    #[Required('account_id')]
    public string $accountID;

    /**
     * The type of Smart Link to create.
     *
     * @var value-of<LinkType> $linkType
     */
    #[Required('link_type', enum: LinkType::class)]
    public string $linkType;

    /**
     * The name of the Smart Link.
     */
    #[Required]
    public string $name;

    /**
     * The number of free trial days (required if `link_type` is `free_trial`). Must be between 1 and 360.
     */
    #[Optional('free_trial_days')]
    public ?int $freeTrialDays;

    /**
     * `new SmartLinkCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SmartLinkCreateParams::with(accountID: ..., linkType: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SmartLinkCreateParams)
     *   ->withAccountID(...)
     *   ->withLinkType(...)
     *   ->withName(...)
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
     * @param LinkType|value-of<LinkType> $linkType
     */
    public static function with(
        string $accountID,
        LinkType|string $linkType,
        string $name,
        ?int $freeTrialDays = null,
    ): self {
        $self = new self;

        $self['accountID'] = $accountID;
        $self['linkType'] = $linkType;
        $self['name'] = $name;

        null !== $freeTrialDays && $self['freeTrialDays'] = $freeTrialDays;

        return $self;
    }

    /**
     * The prefixed ID of the account to create the Smart Link for.
     */
    public function withAccountID(string $accountID): self
    {
        $self = clone $this;
        $self['accountID'] = $accountID;

        return $self;
    }

    /**
     * The type of Smart Link to create.
     *
     * @param LinkType|value-of<LinkType> $linkType
     */
    public function withLinkType(LinkType|string $linkType): self
    {
        $self = clone $this;
        $self['linkType'] = $linkType;

        return $self;
    }

    /**
     * The name of the Smart Link.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The number of free trial days (required if `link_type` is `free_trial`). Must be between 1 and 360.
     */
    public function withFreeTrialDays(int $freeTrialDays): self
    {
        $self = clone $this;
        $self['freeTrialDays'] = $freeTrialDays;

        return $self;
    }
}
