<?php
namespace Gess\Content\Entities\Bitrix;

use \Gess\Content\EntityAbstract;
use Bitrix\Main\Loader;

class BlockEntity extends EntityAbstract{

    public function __construct() {
        Loader::includeModule("iblock");
    }

    public function add( array $data ): ?int {
        // TODO: Implement addOne() method.
        return 0;
    }

    public function update( int $id, array $data ): ?int {
        // TODO: Implement updateOne() method.
        return 0;
    }

    public function findOne( int $id ): ?array {
        $result = array();
        $r = CIBlock::GetByID($id);
        if( $r = $r->GetNext() )
            $result = $r;
        unset($r);
        return $result;
    }

    public function findMany( array $parameters ): ?array {
        // TODO: Implement findMany() method.
        return array();
    }

    public function delete( int $id ): ?int {
        // TODO: Implement deleteOne() method.
        return 0;
    }
}