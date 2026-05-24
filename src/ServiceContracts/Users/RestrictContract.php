<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Users;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Users\Restrict\RestrictDeleteResponse;
use Onlyfansapi\Users\Restrict\RestrictNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface RestrictContract
{
    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to restrict
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): RestrictNewResponse;

    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to restrict
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): RestrictDeleteResponse;
}
