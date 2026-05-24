<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\ClientSessions\ClientSessionCreateParams;
use Onlyfansapi\ClientSessions\ClientSessionNewResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
