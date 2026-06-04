<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Media\Vault;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Media\Vault\Lists\ListDeleteResponse;
use OnlyFansAPI\Media\Vault\Lists\ListGetResponse;
use OnlyFansAPI\Media\Vault\Lists\ListListResponse;
use OnlyFansAPI\Media\Vault\Lists\ListNewResponse;
use OnlyFansAPI\Media\Vault\Lists\ListUpdateResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Media\Vault\ListsContract;
use OnlyFansAPI\Services\Media\Vault\Lists\MediaService;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ListsService implements ListsContract
{
    /**
     * @api
     */
    public ListsRawService $raw;

    /**
     * @api
     */
    public MediaService $media;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ListsRawService($client);
        $this->media = new MediaService($client);
    }

    /**
     * @api
     *
     * Create a new Vault list.
     *
     * @param string $account The Account ID
     * @param string $name The name of your new list
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): ListNewResponse {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Show a Vault list.
     *
     * @param string $listID The ID of the list
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $listID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ListGetResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Rename a Vault list.
     *
     * @param string $listID Path param: The ID of the list
     * @param string $account Path param: The Account ID
     * @param string $name Body param: The new name for the vault list. Must not be greater than 255 characters.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $listID,
        string $account,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): ListUpdateResponse {
        $params = Util::removeNulls(['account' => $account, 'name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List your Vault lists (categories).
     *
     * @param string $account The Account ID
     * @param int $limit Number of media to return per page. Default: `24`
     * @param int $offset The offset used for pagination. Default `0`
     * @param string $query optionally, find a list by its name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListListResponse {
        $params = Util::removeNulls(
            ['limit' => $limit, 'offset' => $offset, 'query' => $query]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Vault list.
     *
     * @param string $listID The ID of the list
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ListDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
