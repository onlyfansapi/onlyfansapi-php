<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Queue\QueueCountParams;
use OnlyFansAPI\Queue\QueueCountResponse;
use OnlyFansAPI\Queue\QueueListParams;
use OnlyFansAPI\Queue\QueueListResponse;
use OnlyFansAPI\Queue\QueuePublishParams;
use OnlyFansAPI\Queue\QueuePublishResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface QueueRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|QueueListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|QueueCountParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $queueID The ID of the message queue item. Can be retrieved from Queue or Mass Messaging endpoints
     * @param array<string,mixed>|QueuePublishParams $params
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
    ): BaseResponse;
}
