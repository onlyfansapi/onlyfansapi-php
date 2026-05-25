<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Users;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Users\BlockContract;
use OnlyFansAPI\Users\Block\BlockDeleteResponse;
use OnlyFansAPI\Users\Block\BlockNewResponse;

/**
 * APIs for fetching OnlyFans users.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class BlockService implements BlockContract
{
    /**
     * @api
     */
    public BlockRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BlockRawService($client);
    }

    /**
     * @api
     *
     * Block user from accessing your profile.
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
    ): BlockNewResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unblock a previously blocked user.
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
    ): BlockDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
