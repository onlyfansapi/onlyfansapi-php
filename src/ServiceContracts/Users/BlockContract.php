<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Users;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Users\Block\BlockDeleteResponse;
use OnlyFansAPI\Users\Block\BlockNewResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface BlockContract
{
    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to block
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): BlockNewResponse;

    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to block
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): BlockDeleteResponse;
}
