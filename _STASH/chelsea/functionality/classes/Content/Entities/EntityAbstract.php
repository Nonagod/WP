<?php
namespace Gofann\Content\Entities;

use \Gofann\Abstractions\CRUDInterface;

abstract class EntityAbstract implements CRUDInterface{
    public function doManyAction( string $action_name, array $action_parameters ): array {
        if( !method_exists(static::class, $action_name) ) throw new \Exception("Method '$action_name' does not defined.");
        $results = array();
        foreach( $action_parameters as $parameters ) {
            if( !is_array($parameters) || empty($parameters) ) $results[] = array('Action parameters must have array format.', $parameters);
            else $results[] = array($this->$action_name(...$parameters), $parameters);
        }
        return $results;
    }
}