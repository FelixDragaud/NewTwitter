<?php

Namespace Models;

Use Symfony\Component\Yaml\Parser;
Use Doctrine\DBAL\Configuration;
Use Doctrine\DBAL\DriverManager;

abstract class AbstractModel
{
    
    public function getConnection() {

        $config = new Configuration();
        $yaml = new Parser();
        $routes = $yaml->parse(file_get_contents("./configs/database.yml"))["doctrine"];

        return DriverManager::getConnection($routes, $config);

    }
    
}