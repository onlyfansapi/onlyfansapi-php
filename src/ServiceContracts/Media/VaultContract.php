<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Media;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\FileParam;
use OnlyFansAPI\Media\Vault\VaultDeleteResponse;
use OnlyFansAPI\Media\Vault\VaultGetResponse;
use OnlyFansAPI\Media\Vault\VaultListParams\Field;
use OnlyFansAPI\Media\Vault\VaultListParams\Sort;
use OnlyFansAPI\Media\Vault\VaultListParams\Type;
use OnlyFansAPI\Media\Vault\VaultListResponse;
use OnlyFansAPI\Media\Vault\VaultUploadResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface VaultContract
{
    /**
     * @api
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
    ): VaultGetResponse;

    /**
     * @api
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
    ): VaultListResponse;

    /**
     * @api
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
    ): VaultDeleteResponse;

    /**
     * @api
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
    ): VaultUploadResponse;
}
