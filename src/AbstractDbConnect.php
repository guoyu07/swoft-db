<?php

namespace Swoft\Db;

use Swoft\Pool\AbstractConnect;

/**
 * 数据库抽象连接
 */
abstract class AbstractDbConnect extends AbstractConnect implements DbConnectInterface
{
    /**
     * 收包
     */
    public function recv()
    {
    }

    /**
     * 设置延迟收包
     *
     * @param bool $defer
     */
    public function setDefer($defer = true)
    {
    }

    /**
     * 返回数据库驱动
     *
     * @return string
     */
    public function getDriver(): string
    {
        return $this->connectPool->getDriver();
    }

    /**
     * 解析mysql连接串
     *
     * @param string $uri
     * @return array
     * @throws \InvalidArgumentException
     */
    protected function parseUri(string $uri): array
    {
        $parseAry = parse_url($uri);
        if (! isset($parseAry['host']) || ! isset($parseAry['port']) || ! isset($parseAry['path']) || ! isset($parseAry['query'])) {
            throw new \InvalidArgumentException('数据量连接uri格式不正确，uri=' . $uri);
        }
        $parseAry['database'] = str_replace('/', '', $parseAry['path']);
        $query = $parseAry['query'];
        parse_str($query, $options);

        if (! isset($options['user']) || ! isset($options['password'])) {
            throw new \InvalidArgumentException('数据量连接uri格式不正确，未配置用户名和密码，uri=' . $uri);
        }
        if (! isset($options['charset'])) {
            $options['charset'] = '';
        }

        $configs = array_merge($parseAry, $options);
        unset($configs['path'], $configs['query']);
        return $configs;
    }
}
