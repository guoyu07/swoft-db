<?php

namespace Swoft\Db\Bean\Collector;

use Swoft\Bean\CollectorInterface;
use Swoft\Db\Bean\Annotation\Connect;

/**
 * The collector of connect
 */
class ConnectCollector implements CollectorInterface
{
    /**
     * @var array
     */
    private static $connects = [];

    /**
     * Do collect
     *
     * @param string $className
     * @param null   $objectAnnotation
     * @param string $propertyName
     * @param string $methodName
     * @param null   $propertyValue
     */
    public static function collect(string $className, $objectAnnotation = null, string $propertyName = "", string $methodName = "", $propertyValue = null)
    {
        if ($objectAnnotation instanceof Connect) {
            $type   = $objectAnnotation->getType();
            $driver = $objectAnnotation->getDriver();
            self::$connects[$driver][$type] = $className;
        }
    }

    /**
     * @return array
     */
    public static function getCollector()
    {
        return self::$connects;
    }

}