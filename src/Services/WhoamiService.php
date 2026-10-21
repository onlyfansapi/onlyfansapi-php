<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\WhoamiContract;
use OnlyFansAPI\Whoami\WhoamiGetResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class WhoamiService implements WhoamiContract
{
    /**
     * @api
     */
    public WhoamiRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WhoamiRawService($client);
    }

    /**
     * @api
     *
     * Get details about the currently used API Key & the relevant Team
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): WhoamiGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(requestOptions: $requestOptions);

        return $response->parse();
    }
}
