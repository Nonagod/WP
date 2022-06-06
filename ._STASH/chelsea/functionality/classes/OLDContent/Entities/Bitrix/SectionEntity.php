<?php
namespace Gess\Content\Entities\Bitrix;

use \Gess\Content\EntityAbstract;

use \CIBlockSection;
use \Gess\Content\Entities\Bitrix\Helpers;

class SectionEntity extends EntityAbstract{

    public function add( array $data ): ?int {
        // TODO: Implement addOne() method.
        return 0;
    }

    public function update( int $id, array $data ): ?int {
        // TODO: Implement updateOne() method.
        return 0;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findOne( int $id ): ?array {
        $result = array();

        $r = CIBlockSection::GetByID($id);
        if( $r = $r->GetNext()) { // only for UF_ props
            $r = CIBlockSection::GetList( array(), array("IBLOCK_ID" => $r['IBLOCK_ID'], "ID" => $r['ID']), false, array('IBLOCK_ID', 'ID', 'CODE', 'IBLOCK_SECTION_ID', 'NAME', 'PICTURE', 'DESCRIPTION', 'DESCRIPTION_TYPE', 'DEPTH_LEVEL', 'SECTION_PAGE_URL', 'DETAIL_PICTURE', 'UF_*'), false );
        }

        if( is_a($r, 'CIBlockResult') ) {
            if( $r = $r->GetNext() ) {
                $result = $r;

                // seo
                $result['seo'] = Helpers\BitrixContent::getElemetnSEO('SectionValues', $result['IBLOCK_ID'], $result['ID']);
                //section chain
                $result['seo']['chain'] = Helpers\BitrixContent::getSectionChain($result['IBLOCK_ID'], $result['ID']);
            }
        }

        return $result;
    }

    public function findMany( array $parameters ): ?array {
        $result = array();
        $parameters = array_replace(array('order' => array(), 'filter' => array(), 'cnt' => false, 'select' => array(), 'nav' => false ), $parameters);

        $r = CIBlockSection::GetList(...array_values($parameters));

        if( $parameters['nav']['theme'] )
            $result['pagination'] = Helpers\BitrixContent::getPaginationBlock($r, $parameters['nav']['theme']);


        while( $s = $r->GetNext()) {
            if( $s['ID'] != $parameters['filter']['SECTION_ID'] )
                $result[$s['ID']] = $s;
        }

        unset($groups, $f);
        return $result;
    }

    public function delete( int $id ): ?int {
        // TODO: Implement deleteOne() method.
        return 0;
    }
}