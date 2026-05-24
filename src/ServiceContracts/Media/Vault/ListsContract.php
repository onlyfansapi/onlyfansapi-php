<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Media\Vault;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Vault\Lists\ListDeleteResponse;
use Onlyfansapi\Media\Vault\Lists\ListGetResponse;
use Onlyfansapi\Media\Vault\Lists\ListListResponse;
use Onlyfansapi\Media\Vault\Lists\ListNewResponse;
use Onlyfansapi\Media\Vault\Lists\ListUpdateResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * @param string $listID The ID of the list
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $listID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ListUpdateResponse;

    /**
     * @api
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
    ): ListListResponse;

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
