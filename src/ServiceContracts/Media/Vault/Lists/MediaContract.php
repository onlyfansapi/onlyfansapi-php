<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Media\Vault\Lists;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Vault\Lists\Media\MediaAddResponse;
use Onlyfansapi\Media\Vault\Lists\Media\MediaRemoveResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface MediaContract
{
    /**
     * @api
     *
     * @param string $listID path param: The ID of the list
     * @param string $account Path param: The Account ID
     * @param list<string> $mediaIDs body param: Array of media IDs to add
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        string $account,
        array $mediaIDs,
        RequestOptions|array|null $requestOptions = null,
    ): MediaAddResponse;

    /**
     * @api
     *
     * @param string $listID path param: The ID of the list
     * @param string $account Path param: The Account ID
     * @param list<string> $mediaIDs body param: Array of media IDs to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $listID,
        string $account,
        array $mediaIDs,
        RequestOptions|array|null $requestOptions = null,
    ): MediaRemoveResponse;
}
