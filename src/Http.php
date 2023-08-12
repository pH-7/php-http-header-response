<?php
/**
 * @author      Pierre-Henry Soria <hi@ph7.me>
 * @license     MIT License
 */

declare(strict_types=1);

namespace PH7\PhpHttpResponseHeader;

use PH7\JustHttp\StatusCode;

class Http
{
    protected const STATUS_CODE = [
        100 => '100 Continue',
        101 => '101 Switching Protocols',
        102 => '102 Processing',
        103 => 'Early Hints',
        200 => '200 OK',
        201 => '201 Created',
        202 => '202 Accepted',
        203 => '203 Non-Authoritative Information',
        204 => '204 No Content',
        205 => '205 Reset Content',
        206 => '206 Partial Content',
        207 => '207 Multi-Status',
        208 => '208 Already Reported',
        226 => '226 IM Used',
        300 => '300 Multiple Choices',
        301 => '301 Moved Permanently',
        302 => '302 Found',
        303 => '303 See Other',
        304 => '304 Not Modified',
        305 => '305 Use Proxy',
        307 => '307 Temporary Redirect',
        308 => '308 Permanent Redirect',
        400 => '400 Bad Request',
        401 => '401 Unauthorized',
        402 => '402 Payment Required',
        403 => '403 Forbidden',
        404 => '404 Not Found',
        405 => '405 Method Not Allowed',
        406 => '406 Not Acceptable',
        407 => '407 Proxy Authentication Required',
        408 => '408 Request Time-out',
        409 => '409 Conflict',
        410 => '410 Gone',
        411 => '411 Length Required',
        412 => '412 Precondition Failed',
        413 => '413 Request Entity Too Large',
        414 => '414 Request-URI Too Large',
        415 => '415 Unsupported Media Type',
        416 => '416 Requested range not satisfiable',
        417 => '417 Expectation Failed',
        422 => '422 Unprocessable Entity',
        423 => '423 Locked',
        424 => '424 Method Failure',
        425 => '425 Unordered Collection',
        426 => '426 Upgrade Required',
        428 => '428 Precondition Required',
        429 => '429 Too Many Requests',
        431 => '431 Request Header Fields Too Large',
        500 => '500 Internal Server Error',
        501 => '501 Not Implemented',
        502 => '502 Bad Gateway',
        503 => '503 Service Unavailable',
        504 => '504 Gateway Time-out',
        505 => '505 HTTP Version Unsupported',
        506 => '506 Variant Also Negotiates',
        507 => '507 Insufficient Storage',
        508 => '508 Loop Detected',
        509 => '509 Bandwidth Limit Exceede',
        510 => '510 Not Extended',
        511 => '511 Network Authentication Required',
        598 => '598 Network read timeout error',
        599 => '599 Network connect timeout error'
    ];


    /**
     * Give the HTTP status code name (e.g. '204 No Content').
     *
     * @param int $status The "code" for the HTTP status.
     *
     * @return string|bool $status The correct HTTP status code if found, FALSE otherwise.
     */
    public static function getStatusCode(int $status): string|bool
    {
        return !empty(static::STATUS_CODE[$status]) ? static::STATUS_CODE[$status] : false;
    }

    /**
     * Retrieve the list with headers that are sent or to be sent.
     */
    public static function getHeadersList(): array
    {
        return headers_list();
    }

    /**
     * Set one or multiple headers.
     *
     * @param string|array $headers Headers to send.
     *
     * @throws Exception
     */
    public static function setHeaders(string|array $headers): void
    {
        if (static::areHeadersSent()) {
            throw new Exception('Headers were already sent.');
        }

        // Loop elements, cast type and set header
        foreach ((array)$headers as $header) {
            header((string)$header);
        }
    }

    /**
     * Parse headers for a given status code.
     *
     * @param int $code The code to use, possible values are: 200, 301, 302, 304, 307, 400, 401, 403, 404, 410, 500, 501, ...
     *
     * @throws Exception
     */
    public static function setHeadersByCode(int $code = StatusCode::OK): void
    {
        if (!static::getStatusCode($code)) {
            $code = StatusCode::OK;
        }

        static::setHeaders(static::getProtocol() . ' ' . static::getStatusCode($code));
    }

    /**
     * Set a HTTP Content Type.
     *
     * @param string $type The content type value. e.g. 'text/xml'
     *
     * @throws Exception
     */
    public static function setContentType(string $type): void
    {
        static::setHeaders('Content-Type: ' . $type);
    }

    /**
     * Set the HTTP status code for the maintenance page.
     *
     * @param int $maintenanceTimeSeconds Time site will be down for (in seconds).
     */
    public static function setMaintenanceCode(int $maintenanceTimeSeconds): void
    {
        header(static::getProtocol() . ' 503 Service Temporarily Unavailable');
        header('Retry-After: ' . $maintenanceTimeSeconds);
    }


    /**
     * @return string|null The HTTP server protocol.
     */
    public static function getProtocol(): ?string
    {
        return Server::getVariable(Server::SERVER_PROTOCOL);
    }

    /**
     * Checks if any headers were already sent.
     *
     * @return bool TRUE if the headers were sent, FALSE if not.
     */
    private static function areHeadersSent(): bool
    {
        return headers_sent();
    }
}
