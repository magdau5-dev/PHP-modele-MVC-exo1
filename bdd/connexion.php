<?php

class DBConnect
{
    function getPDO()
    {
        $env = parse_ini_file(__DIR__ . '/../.env');

        return new PDO(
            "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset=utf8mb4",
            $env['DB_USER'],
            $env['DB_PASSWORD']
        );
    }
}
