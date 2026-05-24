<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SmartLinkPostbacksContract;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackCreateParams\SmartLinkScope;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackGetResponse;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackListResponse;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackNewResponse;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateResponse;

/**
 * APIs for managing Smart Link postback destinations.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class SmartLinkPostbacksService implements SmartLinkPostbacksContract
{
    /**
     * @api
     */
    public SmartLinkPostbacksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SmartLinkPostbacksRawService($client);
    }

    /**
     * @api
     *
     * Create a postback that fires for selected Smart Link conversion types
     *
     * @param list<string> $conversionTypes one or more Smart Link conversion types that should trigger this postback
     * @param SmartLinkScope|value-of<SmartLinkScope> $smartLinkScope `global` fires for all Smart Links. `campaign_specific` fires only for selected Smart Links.
     * @param string $url The destination URL. Variables such as `{click_id}`, `{fbclid}`, `{gclid}`, and `{ttclid}` are replaced when the postback is dispatched.
     * @param list<string> $smartLinkIDs Smart Link ULIDs. Required when `smart_link_scope` is `campaign_specific`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $conversionTypes,
        SmartLinkScope|string $smartLinkScope,
        string $url,
        ?array $smartLinkIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkPostbackNewResponse {
        $params = Util::removeNulls(
            [
                'conversionTypes' => $conversionTypes,
                'smartLinkScope' => $smartLinkScope,
                'url' => $url,
                'smartLinkIDs' => $smartLinkIDs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Smart Link postback by ID
     *
     * @param int $postbackID The postback ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $postbackID,
        RequestOptions|array|null $requestOptions = null
    ): SmartLinkPostbackGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($postbackID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Smart Link postback configuration
     *
     * @param int $postbackID The postback ID
     * @param list<string> $conversionTypes one or more Smart Link conversion types that should trigger this postback
     * @param \Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\SmartLinkScope|value-of<\Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\SmartLinkScope> $smartLinkScope `global` or `campaign_specific`
     * @param string $url the destination URL
     * @param list<string> $smartLinkIDs Smart Link ULIDs. Required when `smart_link_scope` is `campaign_specific`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $postbackID,
        array $conversionTypes,
        \Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateParams\SmartLinkScope|string $smartLinkScope,
        string $url,
        ?array $smartLinkIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkPostbackUpdateResponse {
        $params = Util::removeNulls(
            [
                'conversionTypes' => $conversionTypes,
                'smartLinkScope' => $smartLinkScope,
                'url' => $url,
                'smartLinkIDs' => $smartLinkIDs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($postbackID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Smart Link postbacks configured for your Team
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): SmartLinkPostbackListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Smart Link postback
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
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($postbackID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
