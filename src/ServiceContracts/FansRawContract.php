<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Fans\FanGetSubscriptionHistoryParams;
use Onlyfansapi\Fans\FanGetSubscriptionHistoryResponse;
use Onlyfansapi\Fans\FanListActiveParams;
use Onlyfansapi\Fans\FanListActiveResponse;
use Onlyfansapi\Fans\FanListAllParams;
use Onlyfansapi\Fans\FanListAllResponse;
use Onlyfansapi\Fans\FanListExpiredParams;
use Onlyfansapi\Fans\FanListExpiredResponse;
use Onlyfansapi\Fans\FanListLatestParams;
use Onlyfansapi\Fans\FanListLatestResponse;
use Onlyfansapi\Fans\FanListTopParams;
use Onlyfansapi\Fans\FanListTopResponse;
use Onlyfansapi\Fans\FanSetCustomNameParams;
use Onlyfansapi\Fans\FanSetCustomNameResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface FansRawContract
{
    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the User
     * @param array<string,mixed>|FanGetSubscriptionHistoryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanGetSubscriptionHistoryResponse>
     *
     * @throws APIException
     */
    public function getSubscriptionHistory(
        string $userID,
        array|FanGetSubscriptionHistoryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|FanListActiveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListActiveResponse>
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        array|FanListActiveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|FanListAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListAllResponse>
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        array|FanListAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|FanListExpiredParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListExpiredResponse>
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        array|FanListExpiredParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|FanListLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListLatestResponse>
     *
     * @throws APIException
     */
    public function listLatest(
        string $account,
        array|FanListLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|FanListTopParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanListTopResponse>
     *
     * @throws APIException
     */
    public function listTop(
        string $account,
        array|FanListTopParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param array<string,mixed>|FanSetCustomNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FanSetCustomNameResponse>
     *
     * @throws APIException
     */
    public function setCustomName(
        string $fanID,
        array|FanSetCustomNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
