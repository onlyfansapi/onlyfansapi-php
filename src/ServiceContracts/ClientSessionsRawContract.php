<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\ClientSessions\ClientSessionCreateParams;
use OnlyFansAPI\ClientSessions\ClientSessionNewResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface ClientSessionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ClientSessionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ClientSessionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ClientSessionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
