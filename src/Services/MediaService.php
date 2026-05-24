<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Media\MediaScrapeResponse;
use Onlyfansapi\Media\MediaUploadParams\Type;
use Onlyfansapi\Media\MediaUploadResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\MediaContract;
use Onlyfansapi\Services\Media\VaultService;

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
     * @api
     */
    public VaultService $vault;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MediaRawService($client);
        $this->vault = new VaultService($client);
    }

    /**
     * @api
     *
     * Scrapes a `https://cdn*.onlyfans.com/*` URL and uploads it to the OnlyFans API CDN, so that you can view or download the file. **Max file size is 500MB**
     *
     * @param string $account The Account ID
     * @param string $url The CDN URL to scrape. **Keep in mind that these URLs expire fast.**
     * @param string|null $expirationDate The expiration date of our returned `temporary_url`. Default of 5 minutes.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function scrape(
        string $account,
        string $url,
        ?string $expirationDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaScrapeResponse {
        $params = Util::removeNulls(
            ['url' => $url, 'expirationDate' => $expirationDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->scrape($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * The response can be used **only once** to manually include media in a post or message. This endpoint does not upload media to the Vault.
     *
     * @param string $account The Account ID
     * @param string $file the file to upload
     * @param Type|value-of<Type> $type set to `avatar` if this file will be used as a profile picture, `header` for a profile banner, or keep empty if this file will be for anything else
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        string $account,
        string $file,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaUploadResponse {
        $params = Util::removeNulls(['file' => $file, 'type' => $type]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
