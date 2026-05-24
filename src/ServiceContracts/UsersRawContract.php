<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Users\UserGetResponse;
use Onlyfansapi\Users\UserRetrieveParams;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface UsersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UserRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        array|UserRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
