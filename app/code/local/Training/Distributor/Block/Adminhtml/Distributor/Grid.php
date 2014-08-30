<?php

class Training_Distributor_Block_Adminhtml_Distributor_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Initialize grid settings
     */
    protected function _construct()
    {
        $this->setId('training_distributor_list');
        $this->setDefaultSort('entity_id');

        /*
         * Override method getGridUrl() in this class to provide URL for ajax
         */
        $this->setUseAjax(true);
        $this->setSaveParametersInSession(true);

        return parent::_construct();
    }

    /**
     * Return Grid URL for AJAX query
     *
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }

    /**
     * Return URL where to send the user when he clicks on a row
     *
     * @param Mage_Core_Model_Abstract
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /**
     * Prepare distributor collection
     *
     * @return Training_Distributor_Block_Adminhtml_Distributor_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('training_distributor/distributor_collection');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }


    /**
     * Prepare grid columns
     *
     * @return Training_Distributor_Block_Adminhtml_Distributor_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => $this->__('ID'),
            'sortable' => true,
            'width' => '60px',
            'index' => 'entity_id',
            'type' => 'number'
        ));

        $this->addColumn('email', array(
            'header' => $this->__('Distributor Email'),
            'index' => 'email',
        ));

        $this->addColumn('name', array(
            'header' => $this->__('Name'),
            'index' => 'name',
            'column_css_class' => 'name'
        ));

        $this->addColumn('comment', array(
            'header' => $this->__('Comment'),
            'index' => 'comment',
            'renderer' => 'adminhtml/widget_grid_column_renderer_longtext',
            'string_limit' => 100,
            'escape' => true,
            'nl2br' => true,
        ));

        if (! $this->_isExport) {
            $this->addColumn('action', array(
                'header' => $this->__('Action'),
                'width' => '100px',
                'type' => 'action',
                'getter' => 'getId',
                'actions' => array(
                    array(
                        'caption' => $this->__('Edit'),
                        'url' => array('base' => '*/*/edit'),
                        'field' => 'id',
                    ),
                    //array(
                    //	'caption' => $this->__('Delete'),
                    //	'url' => array('base' => '*/*/delete'),
                    //	'field' => 'id',
                    //),

                ),
                'filter' => false,
                'sortable' => false,
            ));
        }
        $this->addExportType('*/*/exportCsv', $this->__('CSV'));
        $this->addExportType('*/*/exportXml', $this->__('Excel XML'));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('distributors');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/deleteMass')
        ));

        return parent::_prepareMassaction();
    }
}