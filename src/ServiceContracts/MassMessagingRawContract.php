<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\MassMessaging\MassMessagingDeleteParams;
use Onlyfansapi\MassMessaging\MassMessagingDeleteResponse;
use Onlyfansapi\MassMessaging\MassMessagingGetResponse;
use Onlyfansapi\MassMessaging\MassMessagingListQueueResponse;
use Onlyfansapi\MassMessaging\MassMessagingRetrieveParams;
use Onlyfansapi\MassMessaging\MassMessagingSendParams;
use Onlyfansapi\MassMessaging\MassMessagingSendResponse;
use Onlyfansapi\MassMessaging\MassMessagingUpdateParams;
use Onlyfansapi\MassMessaging\MassMessagingUpdateResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface MassMessagingRawContract
{
    /**
     * @api
     *
     * @param string $id The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param array<string,mixed>|MassMessagingRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|MassMessagingRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Path param: The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param array<string,mixed>|MassMessagingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MassMessagingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param array<string,mixed>|MassMessagingDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|MassMessagingDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingListQueueResponse>
     *
     * @throws APIException
     */
    public function listQueue(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|MassMessagingSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingSendResponse>
     *
     * @throws APIException
     */
    public function send(
        string $account,
        array|MassMessagingSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
