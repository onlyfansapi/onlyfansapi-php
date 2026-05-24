<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Media;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Media\Vault\VaultDeleteResponse;
use Onlyfansapi\Media\Vault\VaultListParams\Field;
use Onlyfansapi\Media\Vault\VaultListParams\Sort;
use Onlyfansapi\Media\Vault\VaultListParams\Type;
use Onlyfansapi\Media\Vault\VaultListResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Media\VaultContract;
use Onlyfansapi\Services\Media\Vault\ListsService;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class VaultService implements VaultContract
{
    /**
     * @api
     */
    public VaultRawService $raw;

    /**
     * @api
     */
    public ListsService $lists;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VaultRawService($client);
        $this->lists = new ListsService($client);
    }

    /**
     * @api
     *
     * List media items stored in your vault. See how many likes and how much tips did they get.
     *
     * @param string $account The Account ID
     * @param Field|value-of<Field> $field Sort the results by a field. Default `recent`
     * @param int $limit Number of media to return per page (10 - 100). Default: `24`
     * @param int $list Only show media items from a specific list (category). **Refer to our Media Vault Lists endpoints.**
     * @param int $offset The offset used for pagination. Default `0`
     * @param string|null $query optionally, search for a text query
     * @param Sort|value-of<Sort> $sort Sort the results. Default `desc`
     * @param Type|value-of<Type> $type Filter the results by a media type. Keep empty to show all media.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        Field|string|null $field = null,
        ?int $limit = null,
        ?int $list = null,
        ?int $offset = null,
        ?string $query = null,
        Sort|string|null $sort = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): VaultListResponse {
        $params = Util::removeNulls(
            [
                'field' => $field,
                'limit' => $limit,
                'list' => $list,
                'offset' => $offset,
                'query' => $query,
                'sort' => $sort,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete one or multiple media from your vault.
     *
     * @param string $account The Account ID
     * @param list<string> $mediaIDs array of media IDs to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $account,
        array $mediaIDs,
        RequestOptions|array|null $requestOptions = null,
    ): VaultDeleteResponse {
        $params = Util::removeNulls(['mediaIDs' => $mediaIDs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
