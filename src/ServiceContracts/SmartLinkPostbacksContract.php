<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackCreateParams\Header;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackCreateParams\HTTPMethod;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackCreateParams\SmartLinkScope;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackGetResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackNewResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateResponse;

/**
 * @phpstan-import-type HeaderShape from \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackCreateParams\Header
 * @phpstan-import-type HeaderShape from \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\Header as HeaderShape1
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SmartLinkPostbacksContract
{
    /**
     * @api
     *
     * @param list<string> $conversionTypes one or more Smart Link conversion types that should trigger this postback
     * @param SmartLinkScope|value-of<SmartLinkScope> $smartLinkScope `global` fires for all Smart Links. `campaign_specific` fires only for selected Smart Links.
     * @param string $url The destination URL. Variables such as `{external_click_id}`, `{fbclid}`, `{gclid}`, and `{ttclid}` are replaced when the postback is dispatched.
     * @param string $body Optional request body template for POST postbacks. Variables are replaced when the postback is dispatched.
     * @param list<Header|HeaderShape> $headers Optional request headers. Header values may include postback variables.
     * @param HTTPMethod|value-of<HTTPMethod> $httpMethod HTTP method used for the postback request. Defaults to `GET` when omitted.
     * @param list<string> $smartLinkIDs Smart Link ULIDs. Required when `smart_link_scope` is `campaign_specific`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $conversionTypes,
        SmartLinkScope|string $smartLinkScope,
        string $url,
        ?string $body = null,
        ?array $headers = null,
        HTTPMethod|string|null $httpMethod = null,
        ?array $smartLinkIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkPostbackNewResponse;

    /**
     * @api
     *
     * @param int $postbackID The postback ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $postbackID,
        RequestOptions|array|null $requestOptions = null
    ): SmartLinkPostbackGetResponse;

    /**
     * @api
     *
     * @param int $postbackID The postback ID
     * @param list<string> $conversionTypes one or more Smart Link conversion types that should trigger this postback
     * @param \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\SmartLinkScope|value-of<\OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\SmartLinkScope> $smartLinkScope `global` or `campaign_specific`
     * @param string $url the destination URL
     * @param string $body Optional request body template for POST postbacks. Variables are replaced when the postback is dispatched.
     * @param list<\OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\Header|HeaderShape1> $headers Optional request headers. Header values may include postback variables.
     * @param \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\HTTPMethod|value-of<\OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\HTTPMethod> $httpMethod HTTP method used for the postback request. Existing value is kept when omitted.
     * @param list<string> $smartLinkIDs Smart Link ULIDs. Required when `smart_link_scope` is `campaign_specific`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $postbackID,
        array $conversionTypes,
        \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\SmartLinkScope|string $smartLinkScope,
        string $url,
        ?string $body = null,
        ?array $headers = null,
        \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\HTTPMethod|string|null $httpMethod = null,
        ?array $smartLinkIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkPostbackUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): SmartLinkPostbackListResponse;

    /**
     * @api
     *
     * @param int $postbackID The postback ID
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $postbackID,
        RequestOptions|array|null $requestOptions = null
    ): array;
}
