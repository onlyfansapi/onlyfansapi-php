<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Conversion\MapOf;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SmartLinkPostbacksRawContract;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackCreateParams;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackCreateParams\SmartLinkScope;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackGetResponse;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackListResponse;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackNewResponse;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateParams;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateResponse;

/**
 * APIs for managing Smart Link postback destinations.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class SmartLinkPostbacksRawService implements SmartLinkPostbacksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a postback that fires for selected Smart Link conversion types
     *
     * @param array{
     *   conversionTypes: list<string>,
     *   smartLinkScope: SmartLinkScope|value-of<SmartLinkScope>,
     *   url: string,
     *   smartLinkIDs?: list<string>,
     * }|SmartLinkPostbackCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkPostbackNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SmartLinkPostbackCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SmartLinkPostbackCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/smart-link-postbacks',
            body: (object) $parsed,
            options: $options,
            convert: SmartLinkPostbackNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Smart Link postback by ID
     *
     * @param int $postbackID The postback ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkPostbackGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        int $postbackID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/smart-link-postbacks/%1$s', $postbackID],
            options: $requestOptions,
            convert: SmartLinkPostbackGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a Smart Link postback configuration
     *
     * @param int $postbackID The postback ID
     * @param array{
     *   conversionTypes: list<string>,
     *   smartLinkScope: SmartLinkPostbackUpdateParams\SmartLinkScope|value-of<SmartLinkPostbackUpdateParams\SmartLinkScope>,
     *   url: string,
     *   smartLinkIDs?: list<string>,
     * }|SmartLinkPostbackUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkPostbackUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        int $postbackID,
        array|SmartLinkPostbackUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SmartLinkPostbackUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['api/smart-link-postbacks/%1$s', $postbackID],
            body: (object) $parsed,
            options: $options,
            convert: SmartLinkPostbackUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Smart Link postbacks configured for your Team
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkPostbackListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/smart-link-postbacks',
            options: $requestOptions,
            convert: SmartLinkPostbackListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Smart Link postback
     *
     * @param int $postbackID The postback ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function delete(
        int $postbackID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/smart-link-postbacks/%1$s', $postbackID],
            options: $requestOptions,
            convert: new MapOf('mixed'),
        );
    }
}
