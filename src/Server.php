<?php

namespace PH7\PhpHttpResponseHeader;

final class Server
{
    const SERVER_PROTOCOL = 'SERVER_PROTOCOL';

    /**
     * Retrieve a member of the $_SERVER super global.
     *
     * @param string|null $sKey If NULL, returns the entire $_SERVER variable.
     * @param string|null $sDefVal A default value to use if server key is not found.
     */
    public static function getVariable(?string $sKey = null, ?string $sDefVal = null): string|array|null
    {
        if (null === $sKey) {
            return $_SERVER;
        }

        return !empty($_SERVER[$sKey]) ? htmlspecialchars((string)$_SERVER[$sKey], ENT_QUOTES) : $sDefVal;
    }
}