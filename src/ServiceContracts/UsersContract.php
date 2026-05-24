<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Users\UserGetResponse;
use Onlyfansapi\Users\UserListResponse;

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

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $ids Comma-separated list of user IDs (max. 10 IDs). Must be at least 1 character.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        string $ids,
        RequestOptions|array|null $requestOptions = null,
    ): UserListResponse;
}
