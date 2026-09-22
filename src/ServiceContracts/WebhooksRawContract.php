<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Webhooks\WebhookCreateParams;
use OnlyFansAPI\Webhooks\WebhookGetResponse;
use OnlyFansAPI\Webhooks\WebhookListEventsResponse;
use OnlyFansAPI\Webhooks\WebhookListResponse;
use OnlyFansAPI\Webhooks\WebhookNewResponse;
use OnlyFansAPI\Webhooks\WebhookUpdateParams;
use OnlyFansAPI\Webhooks\WebhookUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface WebhooksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WebhookCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WebhookCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $webhookID The ID of the webhook
     * @param array<string,mixed>|WebhookUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookListEventsResponse>
     *
     * @throws APIException
     */
    public function listEvents(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
