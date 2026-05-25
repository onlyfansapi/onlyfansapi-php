<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Media;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\FileParam;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Media\Vault\VaultDeleteResponse;
use OnlyFansAPI\Media\Vault\VaultGetResponse;
use OnlyFansAPI\Media\Vault\VaultListParams\Field;
use OnlyFansAPI\Media\Vault\VaultListParams\Sort;
use OnlyFansAPI\Media\Vault\VaultListParams\Type;
use OnlyFansAPI\Media\Vault\VaultListResponse;
use OnlyFansAPI\Media\Vault\VaultUploadResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Media\VaultContract;
use OnlyFansAPI\Services\Media\Vault\ListsService;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     * Retrieve details about a specific media item in your vault.
     *
     * @param int $mediaID the ID of the media item to retrieve
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $mediaID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): VaultGetResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($mediaID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
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

    /**
     * @api
     *
     * Upload a media file directly to your vault.
     *
     * @param string $account The Account ID
     * @param bool $async Set to `true` to process uploads in the background. Returns a `polling_url` to check status. Recommended for large files.
     * @param string|FileParam $file The file to upload. Required if `file_url` is not provided. Maximum file size: 100 MB (limited by Cloudflare).
     * @param string $fileURL A URL to download the file from. Required if `file` is not provided. Maximum file size depends on the subscription configuration.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        string $account,
        ?bool $async = null,
        string|FileParam|null $file = null,
        ?string $fileURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): VaultUploadResponse {
        $params = Util::removeNulls(
            ['async' => $async, 'file' => $file, 'fileURL' => $fileURL]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
