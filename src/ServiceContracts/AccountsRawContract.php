<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Accounts\AccountListParams;
use Onlyfansapi\Accounts\AccountListResponseItem;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface AccountsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AccountListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<AccountListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        array|AccountListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the ID of the account
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function disconnect(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
