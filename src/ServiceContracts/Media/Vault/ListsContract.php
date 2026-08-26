<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Media\Vault;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Media\Vault\Lists\ListDeleteResponse;
use OnlyFansAPI\Media\Vault\Lists\ListGetResponse;
use OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember0;
use OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1;
use OnlyFansAPI\Media\Vault\Lists\ListNewResponse;
use OnlyFansAPI\Media\Vault\Lists\ListUpdateResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface ListsContract
{
    /**
     * @api
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
    ): ListNewResponse;

    /**
     * @api
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
    ): ListGetResponse;

    /**
     * @api
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
    ): ListUpdateResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param bool $lightweight Set to `true` to return only `id`, `name`, `type`, `canUpdate` and a rolled-up `mediaCount` per list, dropping the `medias` previews. Much smaller payload — ideal for rendering a folder picker. Default: `false`
     * @param int $limit Number of media to return per page. Default: `24`
     * @param int $offset The offset used for pagination. Default `0`
     * @param string $query optionally, find a list by its name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?bool $lightweight = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnionMember0|UnionMember1;

    /**
     * @api
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
    ): ListDeleteResponse;
}
