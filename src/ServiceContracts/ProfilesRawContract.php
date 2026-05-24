<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Profiles\ProfileGetResponse;
use Onlyfansapi\Profiles\ProfileRetrieveParams;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface ProfilesRawContract
{
    /**
     * @api
     *
     * @param string $username The username of the profile to get
     * @param array<string,mixed>|ProfileRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        array|ProfileRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
