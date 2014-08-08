<?php

/**
 * Class OrganicInternet_SimpleConfigurableProducts_Catalog_Model_Resource_Eav_Mysql4_Product_Indexer_Price_Configurable_Abstract
 */

if (class_exists('Innoexts_Warehouse_Model_Mysql4_Catalog_Product_Indexer_Price_Configurable')) {
class OrganicInternet_SimpleConfigurableProducts_Catalog_Model_Resource_Eav_Mysql4_Product_Indexer_Price_Configurable_Abstract
    extends Innoexts_Warehouse_Model_Mysql4_Catalog_Product_Indexer_Price_Configurable
{

    protected function getOuterColumns() {
        return array(
            'customer_group_id',
            'website_id',
            'tax_class_id',
            'orig_price',
            'price',
            'min_price',
            'max_price'     => new Zend_Db_Expr('MAX(inner.max_price)'),
            'tier_price',
            'base_tier',
            'group_price',
            'base_group_price',
            'stock_id',
            #'child_entity_id'
        );
    }

    protected function getInnerColumns() {
        return array(
            'entity_id'         => new Zend_Db_Expr('e.entity_id'),
            'customer_group_id' => new Zend_Db_Expr('pi.customer_group_id'),
            'website_id'        => new Zend_Db_Expr('cw.website_id'),
            'tax_class_id'      => new Zend_Db_Expr('pi.tax_class_id'),
            'orig_price'        => new Zend_Db_Expr('pi.price'),
            'price'             => new Zend_Db_Expr('pi.final_price'),
            'min_price'         => new Zend_Db_Expr('pi.final_price'),
            'max_price'         => new Zend_Db_Expr('pi.final_price'),
            'tier_price'        => new Zend_Db_Expr('pi.tier_price'),
            'base_tier'         => new Zend_Db_Expr('pi.tier_price'),
            'group_price'       => new Zend_Db_Expr('pi.group_price'),
            'base_group_price'  => new Zend_Db_Expr('pi.group_price'),
            'stock_id'      => new Zend_Db_Expr('cis.stock_id')
        );
    }

    protected function getGroupBy() {
        return array('inner.entity_id', 'inner.customer_group_id', 'inner.website_id','inner.stock_id');
    }
}

} else {
    class OrganicInternet_SimpleConfigurableProducts_Catalog_Model_Resource_Eav_Mysql4_Product_Indexer_Price_Configurable_Abstract
        extends Mage_Catalog_Model_Resource_Eav_Mysql4_Product_Indexer_Price_Configurable
    {
        protected function getOuterColumns() {
            return array(
                'customer_group_id',
                'website_id',
                'tax_class_id',
                'orig_price',
                'price',
                'min_price',
                'max_price'     => new Zend_Db_Expr('MAX(inner.max_price)'),
                'tier_price',
                'base_tier',
                'group_price',
                'base_group_price',
                #'child_entity_id'
            );
        }

        protected function getInnerColumns() {
            return array(
                'entity_id'         => new Zend_Db_Expr('e.entity_id'),
                'customer_group_id' => new Zend_Db_Expr('pi.customer_group_id'),
                'website_id'        => new Zend_Db_Expr('cw.website_id'),
                'tax_class_id'      => new Zend_Db_Expr('pi.tax_class_id'),
                'orig_price'        => new Zend_Db_Expr('pi.price'),
                'price'             => new Zend_Db_Expr('pi.final_price'),
                'min_price'         => new Zend_Db_Expr('pi.final_price'),
                'max_price'         => new Zend_Db_Expr('pi.final_price'),
                'tier_price'        => new Zend_Db_Expr('pi.tier_price'),
                'base_tier'         => new Zend_Db_Expr('pi.tier_price'),
                'group_price'       => new Zend_Db_Expr('pi.group_price'),
                'base_group_price'  => new Zend_Db_Expr('pi.group_price')
            );
        }

        protected function getGroupBy() {
            return array('inner.entity_id', 'inner.customer_group_id', 'inner.website_id');
        }
    }
}