<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Users;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Users\RestrictContract;
use Onlyfansapi\Users\Restrict\RestrictDeleteResponse;
use Onlyfansapi\Users\Restrict\RestrictNewResponse;

/**
 * APIs for fetching OnlyFans users.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class RestrictService implements RestrictContract
{
    /**
     * @api
     */
    public RestrictRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RestrictRawService($client);
    }

    /**
     * @api
     *
     * Restrict a user. You will not see messages or comments from this them.
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
    ): RestrictNewResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unrestrict a previously restricted user. You will start seeing messages and comments from them again.
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
    ): RestrictDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
