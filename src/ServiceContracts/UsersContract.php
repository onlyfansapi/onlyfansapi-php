<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Users\UserGetResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface UsersContract
{
    /**
     * @api
     *
     * @param string $username the OnlyFans username of the user to retrieve details for
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): UserGetResponse;
}
