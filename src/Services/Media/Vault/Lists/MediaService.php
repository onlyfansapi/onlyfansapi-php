<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Media\Vault\Lists;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Media\Vault\Lists\Media\MediaAddResponse;
use Onlyfansapi\Media\Vault\Lists\Media\MediaRemoveResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Media\Vault\Lists\MediaContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class MediaService implements MediaContract
{
    /**
     * @api
     */
    public MediaRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MediaRawService($client);
    }

    /**
     * @api
     *
     * Add one or multiple media to a list.
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
    ): MediaAddResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'mediaIDs' => $mediaIDs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove one or multiple media from a list.
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
    ): MediaRemoveResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'mediaIDs' => $mediaIDs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
