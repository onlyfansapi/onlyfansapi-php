<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinkPostbacks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackCreateParams\SmartLinkScope;

/**
 * Create a postback that fires for selected Smart Link conversion types.
 *
 * @see OnlyFansAPI\Services\SmartLinkPostbacksService::create()
 *
 * @phpstan-type SmartLinkPostbackCreateParamsShape = array{
 *   conversionTypes: list<string>,
 *   smartLinkScope: SmartLinkScope|value-of<SmartLinkScope>,
 *   url: string,
 *   smartLinkIDs?: list<string>|null,
 * }
 */
final class SmartLinkPostbackCreateParams implements BaseModel
{
    /** @use SdkModel<SmartLinkPostbackCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * One or more Smart Link conversion types that should trigger this postback.
     *
     * @var list<string> $conversionTypes
     */
    #[Required('conversion_types', list: 'string')]
    public array $conversionTypes;

    /**
     * `global` fires for all Smart Links. `campaign_specific` fires only for selected Smart Links.
     *
     * @var value-of<SmartLinkScope> $smartLinkScope
     */
    #[Required('smart_link_scope', enum: SmartLinkScope::class)]
    public string $smartLinkScope;

    /**
     * The destination URL. Variables such as `{click_id}`, `{fbclid}`, `{gclid}`, and `{ttclid}` are replaced when the postback is dispatched.
     */
    #[Required]
    public string $url;

    /**
     * Smart Link ULIDs. Required when `smart_link_scope` is `campaign_specific`.
     *
     * @var list<string>|null $smartLinkIDs
     */
    #[Optional('smart_link_ids', list: 'string')]
    public ?array $smartLinkIDs;

    /**
     * `new SmartLinkPostbackCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SmartLinkPostbackCreateParams::with(
     *   conversionTypes: ..., smartLinkScope: ..., url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SmartLinkPostbackCreateParams)
     *   ->withConversionTypes(...)
     *   ->withSmartLinkScope(...)
     *   ->withURL(...)
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
     * @param list<string> $conversionTypes
     * @param SmartLinkScope|value-of<SmartLinkScope> $smartLinkScope
     * @param list<string>|null $smartLinkIDs
     */
    public static function with(
        array $conversionTypes,
        SmartLinkScope|string $smartLinkScope,
        string $url,
        ?array $smartLinkIDs = null,
    ): self {
        $self = new self;

        $self['conversionTypes'] = $conversionTypes;
        $self['smartLinkScope'] = $smartLinkScope;
        $self['url'] = $url;

        null !== $smartLinkIDs && $self['smartLinkIDs'] = $smartLinkIDs;

        return $self;
    }

    /**
     * One or more Smart Link conversion types that should trigger this postback.
     *
     * @param list<string> $conversionTypes
     */
    public function withConversionTypes(array $conversionTypes): self
    {
        $self = clone $this;
        $self['conversionTypes'] = $conversionTypes;

        return $self;
    }

    /**
     * `global` fires for all Smart Links. `campaign_specific` fires only for selected Smart Links.
     *
     * @param SmartLinkScope|value-of<SmartLinkScope> $smartLinkScope
     */
    public function withSmartLinkScope(
        SmartLinkScope|string $smartLinkScope
    ): self {
        $self = clone $this;
        $self['smartLinkScope'] = $smartLinkScope;

        return $self;
    }

    /**
     * The destination URL. Variables such as `{click_id}`, `{fbclid}`, `{gclid}`, and `{ttclid}` are replaced when the postback is dispatched.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Smart Link ULIDs. Required when `smart_link_scope` is `campaign_specific`.
     *
     * @param list<string> $smartLinkIDs
     */
    public function withSmartLinkIDs(array $smartLinkIDs): self
    {
        $self = clone $this;
        $self['smartLinkIDs'] = $smartLinkIDs;

        return $self;
    }
}
