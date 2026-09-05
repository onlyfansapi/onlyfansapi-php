<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Users;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Users\Subscribe\SubscribeCreateParams;
use OnlyFansAPI\Users\Subscribe\SubscribeDeleteParams;
use OnlyFansAPI\Users\Subscribe\SubscribeDeleteResponse;
use OnlyFansAPI\Users\Subscribe\SubscribeNewResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SubscribeRawContract
{
    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to subscribe to
     * @param array<string,mixed>|SubscribeCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscribeNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|SubscribeCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userID path param: The OnlyFans ID of the user to subscribe to
     * @param array<string,mixed>|SubscribeDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscribeDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        array|SubscribeDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
