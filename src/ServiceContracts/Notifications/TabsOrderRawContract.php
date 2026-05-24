<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Notifications;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Notifications\TabsOrder\TabsOrderGetResponse;
use Onlyfansapi\Notifications\TabsOrder\TabsOrderUpdateParams;
use Onlyfansapi\Notifications\TabsOrder\TabsOrderUpdateResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
