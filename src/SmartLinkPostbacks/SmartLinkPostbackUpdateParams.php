<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinkPostbacks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\Header;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\HTTPMethod;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\SmartLinkScope;

/**
 * Update a Smart Link postback configuration.
 *
 * @see OnlyFansAPI\Services\SmartLinkPostbacksService::update()
 *
 * @phpstan-import-type HeaderShape from \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\Header
 *
 * @phpstan-type SmartLinkPostbackUpdateParamsShape = array{
 *   conversionTypes: list<string>,
 *   smartLinkScope: SmartLinkScope|value-of<SmartLinkScope>,
 *   url: string,
 *   body?: string|null,
 *   headers?: list<Header|HeaderShape>|null,
 *   httpMethod?: null|HTTPMethod|value-of<HTTPMethod>,
 *   smartLinkIDs?: list<string>|null,
 * }
 */
final class SmartLinkPostbackUpdateParams implements BaseModel
{
    /** @use SdkModel<SmartLinkPostbackUpdateParamsShape> */
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
     * `global` or `campaign_specific`.
     *
     * @var value-of<SmartLinkScope> $smartLinkScope
     */
    #[Required('smart_link_scope', enum: SmartLinkScope::class)]
    public string $smartLinkScope;

    /**
     * The destination URL.
     */
    #[Required]
    public string $url;

    /**
     * Optional request body template for POST postbacks. Variables are replaced when the postback is dispatched.
     */
    #[Optional]
    public ?string $body;

    /**
     * Optional request headers. Header values may include postback variables.
     *
     * @var list<Header>|null $headers
     */
    #[Optional(list: Header::class)]
    public ?array $headers;

    /**
     * HTTP method used for the postback request. Existing value is kept when omitted.
     *
     * @var value-of<HTTPMethod>|null $httpMethod
     */
    #[Optional('http_method', enum: HTTPMethod::class)]
    public ?string $httpMethod;

    /**
     * Smart Link ULIDs. Required when `smart_link_scope` is `campaign_specific`.
     *
     * @var list<string>|null $smartLinkIDs
     */
    #[Optional('smart_link_ids', list: 'string')]
    public ?array $smartLinkIDs;

    /**
     * `new SmartLinkPostbackUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SmartLinkPostbackUpdateParams::with(
     *   conversionTypes: ..., smartLinkScope: ..., url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SmartLinkPostbackUpdateParams)
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
     * @param list<Header|HeaderShape>|null $headers
     * @param HTTPMethod|value-of<HTTPMethod>|null $httpMethod
     * @param list<string>|null $smartLinkIDs
     */
    public static function with(
        array $conversionTypes,
        SmartLinkScope|string $smartLinkScope,
        string $url,
        ?string $body = null,
        ?array $headers = null,
        HTTPMethod|string|null $httpMethod = null,
        ?array $smartLinkIDs = null,
    ): self {
        $self = new self;

        $self['conversionTypes'] = $conversionTypes;
        $self['smartLinkScope'] = $smartLinkScope;
        $self['url'] = $url;

        null !== $body && $self['body'] = $body;
        null !== $headers && $self['headers'] = $headers;
        null !== $httpMethod && $self['httpMethod'] = $httpMethod;
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
     * `global` or `campaign_specific`.
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
     * The destination URL.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Optional request body template for POST postbacks. Variables are replaced when the postback is dispatched.
     */
    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * Optional request headers. Header values may include postback variables.
     *
     * @param list<Header|HeaderShape> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    /**
     * HTTP method used for the postback request. Existing value is kept when omitted.
     *
     * @param HTTPMethod|value-of<HTTPMethod> $httpMethod
     */
    public function withHTTPMethod(HTTPMethod|string $httpMethod): self
    {
        $self = clone $this;
        $self['httpMethod'] = $httpMethod;

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
