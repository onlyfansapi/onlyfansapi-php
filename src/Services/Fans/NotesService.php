<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Fans;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Fans\Notes\NoteClearNotesResponse;
use Onlyfansapi\Fans\Notes\NoteGetNotesResponse;
use Onlyfansapi\Fans\Notes\NoteNewEditNotesResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Fans\NotesContract;

/**
 * APIs for managing OnlyFans fans (subscribers).
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class NotesService implements NotesContract
{
    /**
     * @api
     */
    public NotesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NotesRawService($client);
    }

    /**
     * @api
     *
     * Clear notes for a specific fan.
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function clearNotes(
        string $fanID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): NoteClearNotesResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clearNotes($fanID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create or edit notes for a specific fan.
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param string $account Path param: The Account ID
     * @param string $notes body param: The new note value
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createEditNotes(
        string $fanID,
        string $account,
        string $notes,
        RequestOptions|array|null $requestOptions = null,
    ): NoteNewEditNotesResponse {
        $params = Util::removeNulls(['account' => $account, 'notes' => $notes]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createEditNotes($fanID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve notes for a specific fan.
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNotes(
        string $fanID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): NoteGetNotesResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getNotes($fanID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
