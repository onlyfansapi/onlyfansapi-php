<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Users;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Users\Block\BlockCreateParams;
use Onlyfansapi\Users\Block\BlockDeleteParams;
use Onlyfansapi\Users\Block\BlockDeleteResponse;
use Onlyfansapi\Users\Block\BlockNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
