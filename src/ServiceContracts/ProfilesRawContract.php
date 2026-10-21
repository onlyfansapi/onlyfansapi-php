<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Profiles\ProfileGetResponse;
use OnlyFansAPI\Profiles\ProfileRetrieveParams;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
