<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\TrialLinks\TrialLinkCreateParams\Duration;
use Onlyfansapi\TrialLinks\TrialLinkCreateParams\OfferLimit;

/**
 * Create a new free trial link for the account.
 *
 * @see Onlyfansapi\Services\TrialLinksService::create()
 *
 * @phpstan-type TrialLinkCreateParamsShape = array{
 *   duration: Duration|value-of<Duration>,
 *   offerExpiration: int,
 *   offerLimit: OfferLimit|value-of<OfferLimit>,
 *   name?: string|null,
 *   tags?: list<string>|null,
 * }
 */
final class TrialLinkCreateParams implements BaseModel
{
    /** @use SdkModel<TrialLinkCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The duration of the free trial **in days**. Must be **1**, **3**, **7**, **14**, **30** (1 month), **90** (3 months), **180** (6 months), or **360** (12 months).
     *
     * @var value-of<Duration> $duration
     */
    #[Required(enum: Duration::class)]
    public int $duration;

    /**
     * The trial link expiration **in days (from now)**. Must either be **0** (to never expire), or a number between **1** and **30**.
     */
    #[Required]
    public int $offerExpiration;

    /**
     * How many people can use this offer. Must either be **0** (for no limit), or a number between **1**-**10**, **50**, or **100**.
     *
     * @var value-of<OfferLimit> $offerLimit
     */
    #[Required(enum: OfferLimit::class)]
    public int $offerLimit;

    /**
     * The name of the trail link (optional). Cannot be longer than 64 characters.
     */
    #[Optional(nullable: true)]
    public ?string $name;

    /**
     * Array of tag names to add to the trial link.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * `new TrialLinkCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrialLinkCreateParams::with(
     *   duration: ..., offerExpiration: ..., offerLimit: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrialLinkCreateParams)
     *   ->withDuration(...)
     *   ->withOfferExpiration(...)
     *   ->withOfferLimit(...)
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
     * @param Duration|value-of<Duration> $duration
     * @param OfferLimit|value-of<OfferLimit> $offerLimit
     * @param list<string>|null $tags
     */
    public static function with(
        Duration|int $duration,
        int $offerExpiration,
        OfferLimit|int $offerLimit,
        ?string $name = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        $self['duration'] = $duration;
        $self['offerExpiration'] = $offerExpiration;
        $self['offerLimit'] = $offerLimit;

        null !== $name && $self['name'] = $name;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * The duration of the free trial **in days**. Must be **1**, **3**, **7**, **14**, **30** (1 month), **90** (3 months), **180** (6 months), or **360** (12 months).
     *
     * @param Duration|value-of<Duration> $duration
     */
    public function withDuration(Duration|int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * The trial link expiration **in days (from now)**. Must either be **0** (to never expire), or a number between **1** and **30**.
     */
    public function withOfferExpiration(int $offerExpiration): self
    {
        $self = clone $this;
        $self['offerExpiration'] = $offerExpiration;

        return $self;
    }

    /**
     * How many people can use this offer. Must either be **0** (for no limit), or a number between **1**-**10**, **50**, or **100**.
     *
     * @param OfferLimit|value-of<OfferLimit> $offerLimit
     */
    public function withOfferLimit(OfferLimit|int $offerLimit): self
    {
        $self = clone $this;
        $self['offerLimit'] = $offerLimit;

        return $self;
    }

    /**
     * The name of the trail link (optional). Cannot be longer than 64 characters.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Array of tag names to add to the trial link.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
