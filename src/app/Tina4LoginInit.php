<?php

/**
 * Tina4Login
 * Copy-right 2023 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */


class Tina4LoginInit
{

    /**
     * Default Keys needed in .env
     * @var string[]
     */
    private static array $keys = [
            "SSO_API_URL" => "sso.poseidontechnologies.co.za",
            "SSO_TOKEN" => "token",
            "SSO_REDIRECT_URL" => "/",
            "SSO_BASE_TWIG_FILE" => "tina4Login-base.twig"
    ];

    protected static string $rootPath = "";
    protected static string $envPath = "";

    /**
     * Function runs after package install
     * @return void
     */
    public final static function postPackageInstall(): void
    {
        self::$rootPath = realpath(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "..");
        self::$envPath = self::$rootPath. DIRECTORY_SEPARATOR . ".env";

        if(file_exists(self::$envPath)) {

            $existingKeys = self::readEnv(self::$envPath);

            foreach (self::$keys as $key => $value) {
                if(!in_array($key, $existingKeys)) {
                    self::writeToEnv(self::$envPath, $key, $value);
                }
            }
        } else {
            foreach (self::$keys as $key => $value) {
                self::writeToEnv(self::$envPath, $key, $value);
            }
        }
    }

    /**
     * Function runs after package install
     * @param Event $event
     * @return void
     */
    public final static function postPackageUpdate(Event $event): void
    {
        self::$rootPath = realpath(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "..");
        self::$envPath = self::$rootPath. DIRECTORY_SEPARATOR . ".env";

        if(file_exists(self::$envPath)) {

            $existingKeys = self::readEnv(self::$envPath);

            foreach (self::$keys as $key => $value) {
                if(!in_array($key, $existingKeys)) {
                    self::writeToEnv(self::$envPath, $key, $value);
                }
            }
        } else {
            foreach (self::$keys as $key => $value) {
                self::writeToEnv(self::$envPath, $key, $value);
            }
        }
    }

    /**
     * Function to read current .env
     * @param $path
     * @return array
     */
    private static function readEnv($path): array
    {
        $existingKeys = [];

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {

            if (str_starts_with(trim($line), '#') || str_starts_with(trim($line), '[') || !str_contains(trim($line), 'SSO')) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $existingKeys[] = trim($name);
        }

        return $existingKeys;
    }

    /**
     * Function to set up your ENV after install
     * @param $env
     * @param $key
     * @param $data
     * @return void
     */
    private static function writeToEnv($env, $key, $data): void
    {
        file_put_contents($env, "\n" . $key . "=" . $data, FILE_APPEND);
    }
}