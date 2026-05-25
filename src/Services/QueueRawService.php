<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Queue\QueueCountParams;
use OnlyFansAPI\Queue\QueueCountResponse;
use OnlyFansAPI\Queue\QueueListParams;
use OnlyFansAPI\Queue\QueueListResponse;
use OnlyFansAPI\Queue\QueuePublishParams;
use OnlyFansAPI\Queue\QueuePublishResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\QueueRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class QueueRawService implements QueueRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List posts and messages in the queue.
     *
     * @param string $account The Account ID
     * @param array{
     *   limit: int, publishDateEnd: string, publishDateStart: string, timezone: string
     * }|QueueListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|QueueListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/queue', $account],
            query: $parsed,
            options: $options,
            convert: QueueListResponse::class,
        );
    }

    /**
     * @api
     *
     * Count posts and messages in the queue.
     *
     * @param string $account The Account ID
     * @param array{
     *   publishDateEnd: string, publishDateStart: string, timezone: string
     * }|QueueCountParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueCountResponse>
     *
     * @throws APIException
     */
    public function count(
        string $account,
        array|QueueCountParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueCountParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/queue/counts', $account],
            query: $parsed,
            options: $options,
            convert: QueueCountResponse::class,
        );
    }

    /**
     * @api
     *
     * Publish a queue item or "saved for later" item (post or mass message). This means that the item will be sent immediately, regardless of its scheduled date.
     *
     * @param string $queueID The ID of the message queue item. Can be retrieved from Queue or Mass Messaging endpoints
     * @param array{account: string}|QueuePublishParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueuePublishResponse>
     *
     * @throws APIException
     */
    public function publish(
        string $queueID,
        array|QueuePublishParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueuePublishParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/queue/%2$s/publish', $account, $queueID],
            options: $options,
            convert: QueuePublishResponse::class,
        );
    }
}
