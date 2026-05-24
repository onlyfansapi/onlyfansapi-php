<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Fans\FanListActiveParams;
use Onlyfansapi\Fans\FanListActiveResponse;
use Onlyfansapi\Fans\FanListAllParams;
use Onlyfansapi\Fans\FanListAllResponse;
use Onlyfansapi\Fans\FanListExpiredParams;
use Onlyfansapi\Fans\FanListExpiredResponse;
use Onlyfansapi\Fans\FanListLatestParams;
use Onlyfansapi\Fans\FanListLatestResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface FansRawContract
{
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
}
