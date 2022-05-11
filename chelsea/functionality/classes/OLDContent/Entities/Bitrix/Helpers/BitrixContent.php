<?php
namespace Gess\Content\Entities\Bitrix\Helpers;

class BitrixContent {
    /**
     * @param string $class \\Bitrix\\Iblock\\InheritedProperty\\
     *      SectionValues
     *      ElementValues
     * @param int $iblock_id
     * @param int $element_id
     * @param string $clear_prefix
     *      SECTION_
     *      ELEMENT_
     * @return mixed
     */
    public static function getElemetnSEO( string $class, int $iblock_id, int $element_id ) {
        $clear_prefix = array(
            'SectionValues' => 'SECTION_',
            'ElementValues' => 'ELEMENT_'
        );
        $clear_prefix = $clear_prefix[$class];

        $class = '\\Bitrix\\Iblock\\InheritedProperty\\' .$class;
        $ipropValues = new $class( $iblock_id, $element_id );
        $data = $ipropValues->getValues();

        foreach( $data as $k => $v ) {
            if( stristr($k, $clear_prefix) ) {
                $n = str_replace($clear_prefix, '', $k);
                $data[$n] = $v;
            }
            unset($data[$k]);
        }

        unset($ipropValues, $r);
        return $data;
    }

    public static function getSectionChain( $iblock_id, $section_id ) {
        $chain = array();
        $nav = \CIBlockSection::GetNavChain($iblock_id, $section_id);

        while($item = $nav->GetNext()) {
            $chain[] = array(
                'name' => $item['NAME'],
                'url' => $item['SECTION_PAGE_URL']
            );
        }
        unset($nav, $section_chain_id, $item);
        return $chain;
    }

    public static function getPaginationBlock( \CDBResult $object, $theme ) {
        $nav_obj = false;
        return array(
            'num' => $object->NavNum,
            'source' => $object->GetPageNavStringEx( $nav_obj, 'Заголовок', $theme, 'Y', null, array('CACHE_TYPE' => 'Y'))
        );
    }

    //            $groups = CIBlockElement::GetElementGroups($f['ID'], true);

}