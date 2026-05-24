<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Users;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Users\Subscribe\SubscribeCreateParams;
use Onlyfansapi\Users\Subscribe\SubscribeDeleteParams;
use Onlyfansapi\Users\Subscribe\SubscribeDeleteResponse;
use Onlyfansapi\Users\Subscribe\SubscribeNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
