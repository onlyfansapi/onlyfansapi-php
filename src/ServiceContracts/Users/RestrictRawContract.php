<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Users;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Users\Restrict\RestrictCreateParams;
use OnlyFansAPI\Users\Restrict\RestrictDeleteParams;
use OnlyFansAPI\Users\Restrict\RestrictDeleteResponse;
use OnlyFansAPI\Users\Restrict\RestrictNewResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface RestrictRawContract
{
    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to restrict
     * @param array<string,mixed>|RestrictCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RestrictNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|RestrictCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to restrict
     * @param array<string,mixed>|RestrictDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RestrictDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        array|RestrictDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
