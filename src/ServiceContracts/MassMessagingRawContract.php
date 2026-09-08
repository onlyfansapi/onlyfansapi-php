<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\MassMessaging\MassMessagingDeleteParams;
use OnlyFansAPI\MassMessaging\MassMessagingDeleteResponse;
use OnlyFansAPI\MassMessaging\MassMessagingGetOverviewResponse;
use OnlyFansAPI\MassMessaging\MassMessagingGetResponse;
use OnlyFansAPI\MassMessaging\MassMessagingListResponse;
use OnlyFansAPI\MassMessaging\MassMessagingRetrieveOverviewParams;
use OnlyFansAPI\MassMessaging\MassMessagingRetrieveParams;
use OnlyFansAPI\MassMessaging\MassMessagingSendParams;
use OnlyFansAPI\MassMessaging\MassMessagingSendResponse;
use OnlyFansAPI\MassMessaging\MassMessagingUpdateParams;
use OnlyFansAPI\MassMessaging\MassMessagingUpdateResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
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
     * @param array<string,mixed>|MassMessagingRetrieveOverviewParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingGetOverviewResponse>
     *
     * @throws APIException
     */
    public function retrieveOverview(
        string $account,
        array|MassMessagingRetrieveOverviewParams $params,
        RequestOptions|array|null $requestOptions = null,
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
