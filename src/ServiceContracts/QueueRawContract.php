<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Queue\QueueCountParams;
use Onlyfansapi\Queue\QueueCountResponse;
use Onlyfansapi\Queue\QueueListParams;
use Onlyfansapi\Queue\QueueListResponse;
use Onlyfansapi\Queue\QueuePublishParams;
use Onlyfansapi\Queue\QueuePublishResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
