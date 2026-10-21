<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Notifications;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Notifications\TabsOrder\TabsOrderGetResponse;
use OnlyFansAPI\Notifications\TabsOrder\TabsOrderUpdateParams;
use OnlyFansAPI\Notifications\TabsOrder\TabsOrderUpdateResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TabsOrderRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|TabsOrderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TabsOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $account,
        array|TabsOrderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TabsOrderGetResponse>
     *
     * @throws APIException
     */
    public function get(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
