<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Conversion\MapOf;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\WebhooksRawContract;
use Onlyfansapi\Webhooks\WebhookCreateParams;
use Onlyfansapi\Webhooks\WebhookGetResponse;
use Onlyfansapi\Webhooks\WebhookListEventsResponse;
use Onlyfansapi\Webhooks\WebhookListResponse;
use Onlyfansapi\Webhooks\WebhookNewResponse;
use Onlyfansapi\Webhooks\WebhookUpdateParams;
use Onlyfansapi\Webhooks\WebhookUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class WebhooksRawService implements WebhooksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new webhook for your Team
     *
     * @param array{
     *   accountScope: string,
     *   endpointURL: string,
     *   events: list<string>,
     *   accountIDs?: list<string>,
     *   signingSecret?: string|null,
     * }|WebhookCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WebhookCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/webhooks',
            body: (object) $parsed,
            options: $options,
            convert: WebhookNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details about a specific webhook
     *
     * @param string $webhookID The ID of the webhook
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $webhookID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/webhooks/%1$s', $webhookID],
            options: $requestOptions,
            convert: WebhookGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update an existing webhook
     *
     * @param string $webhookID The ID of the webhook
     * @param array{
     *   accountScope: string,
     *   endpointURL: string,
     *   events: list<string>,
     *   accountIDs?: list<string>,
     *   enabled?: bool|null,
     * }|WebhookUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $webhookID,
        array|WebhookUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/webhooks/%1$s', $webhookID],
            body: (object) $parsed,
            options: $options,
            convert: WebhookUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of webhooks for your Team
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/webhooks',
            options: $requestOptions,
            convert: WebhookListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing webhook
     *
     * @param string $webhookID The ID of the webhook
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function delete(
        string $webhookID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/webhooks/%1$s', $webhookID],
            options: $requestOptions,
            convert: new MapOf('mixed'),
        );
    }

    /**
     * @api
     *
     * Retrieve a list of all available webhook event types
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookListEventsResponse>
     *
     * @throws APIException
     */
    public function listEvents(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/webhooks/events',
            options: $requestOptions,
            convert: WebhookListEventsResponse::class,
        );
    }
}
