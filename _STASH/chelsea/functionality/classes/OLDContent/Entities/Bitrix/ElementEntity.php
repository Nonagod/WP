<?php
namespace Gess\Content\Entities\Bitrix;

use \Gess\Content\EntityAbstract;
use \CIBlockElement;
use \Gess\Content\Entities\Bitrix\Helpers;


class ElementEntity extends EntityAbstract{

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

        $r = CIBlockElement::GetByID($id);
        //CIBlockResult::SetSectionContext
        $result = array();
        if( $r = $r->GetNextElement() ) {
            $result = $r->GetFields();
            $result['prop'] = $r->GetProperties();
            $groups = $r->GetGroups();

            while($section = $groups->GetNext()) {$result['groups'][$section['ID']] = $section;}

            // seo
            $result['seo'] = Helpers\BitrixContent::getElemetnSEO('ElementValues', $result['IBLOCK_ID'], $result['ID']);
            //section chain
            $result['seo']['chain'] = Helpers\BitrixContent::getSectionChain($result['IBLOCK_ID'], $result['IBLOCK_SECTION_ID']);
        }
        unset($r, $section, $groups);

        return $result;
    }
    /**
     * @param array $parameters
     *      array('order' => array(), 'filter' => array(), 'group' => false, 'nav' => false, 'select' => array() )
     *      for pagination $parameters['nav']['theme']
     * @return array|null
     */
    public function findMany( array $parameters ): ?array {
        $result = array();
        $parameters = array_replace(array('order' => array(), 'filter' => array(), 'group' => false, 'nav' => false, 'select' => array() ), $parameters);

        $r = CIBlockElement::GetList(...array_values($parameters));

        if( $parameters['nav']['theme'] )
            $result['pagination'] = Helpers\BitrixContent::getPaginationBlock($r, $parameters['nav']['theme']);

        while( $e = $r->GetNextElement() ) {
            $f = $e->GetFields();
            $result['elements'][$f['ID']] = $f;
            $result['elements'][$f['ID']]['prop'] = $e->GetProperties();
        }
        unset($groups, $f);

        return $result;
    }

    public function delete( int $id ): ?int {
        // TODO: Implement deleteOne() method.
        return 0;
    }
}