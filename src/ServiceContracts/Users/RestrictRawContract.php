<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Users;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Users\Restrict\RestrictCreateParams;
use Onlyfansapi\Users\Restrict\RestrictDeleteParams;
use Onlyfansapi\Users\Restrict\RestrictDeleteResponse;
use Onlyfansapi\Users\Restrict\RestrictNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
