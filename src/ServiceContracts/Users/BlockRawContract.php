<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Users;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Users\Block\BlockCreateParams;
use OnlyFansAPI\Users\Block\BlockDeleteParams;
use OnlyFansAPI\Users\Block\BlockDeleteResponse;
use OnlyFansAPI\Users\Block\BlockNewResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface BlockRawContract
{
    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to block
     * @param array<string,mixed>|BlockCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BlockNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|BlockCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to block
     * @param array<string,mixed>|BlockDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BlockDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        array|BlockDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
