<?php

namespace Dartmoon\Config;

class Config
{
    /**
     * Instance of config
     */
    protected static $instance = null;

    /**
     * Config file path
     */
    protected $configFilePath = null;

    public function __construct()
    {
        $this->configFilePath = dirname(dirname(dirname(dirname(__DIR__)))) . '/config';
    }

    /**
     * Get a config from config file
     */
    public function get($path, $default = false)
    {
        return $this->getConfig($path, $default);
    }

    /**
     * Get config from config file
     */
    public function getConfig($path, $default)
    {
        $explodedPath = explode('.', $path);
        $config = $this->getConfigFile($explodedPath[0]);

        if (isset($explodedPath[1])) {
            $config = $this->getConfigValue($config, $explodedPath[1], $default);
        }

        return $config;
    }

    /**
     * Get config value
     */
    public function getConfigValue($config, $key, $default)
    {
        if (isset($config[$key])) {
            return $config[$key];
        }

        return $default;
    }

    /**
     * Get config file
     */
    public function getConfigFile($fileName)
    {
        $filePath = $this->configFilePath . $fileName . '.php';

        if (!file_exists($filePath)) {
            return [];
        }

        return include $filePath;
    }
}