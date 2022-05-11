<?php
namespace Gofann\Content;

use \Gofann\Content\Entities\EntityAbstract;
use Gofann\Abstractions\CRUDInterface;

class Content implements CRUDInterface {
    /**
     * @var EntityAbstract
     */
    private $Entity = null;

    public function __construct( $entity_type, $cms_name ) {
        $entity_class = "\\Gofann\\Content\\Entities\\$cms_name\\{$entity_type}Entity";
        if( class_exists($entity_class) )
            $this->Entity = new $entity_class();
        else
            throw new \Exception("Content entity class ($entity_class) is not defined!");
    }

    public function add( array $data ): ?int { return $this->Entity->add( $data ); }
    public function delete( int $id ): ?int { return $this->Entity->delete( $id ); }
    public function update( int $id, array $data ): ?int { return $this->Entity->update( $id, $data ); }
    public function findOne( int $id ): ?array { return $this->Entity->findOne( $id ); }
    public function findMany( array $parameters ): ?array { return $this->Entity->findMany( $parameters ); }
    public function doManyAction( string $action_name, array $action_parameters ): array { return $this->Entity->doManyAction( $action_name, $action_parameters ); }
}