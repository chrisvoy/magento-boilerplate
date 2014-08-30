<?php

class Training_Distributor_Block_Adminhtml_Distributor_Edit_Tabs
    extends Mage_Adminhtml_Block_Widget_Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('switch_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($this->__('Distributor Setup'));
    }

    /**
     * Add tabs content
     *
     * @return Training_Distributor_Block_Adminhtml_Distributor_Edit_Tabs
     */
    protected function _prepareLayout()
    {
        $this->addTab('general_section', array(
            'label'   => $this->__('General'),
            'title'   => $this->__('General'),
            'content' => $this->getLayout()
                    ->createBlock('training_distributor/adminhtml_distributor_edit_tab_general')->toHtml(),
        ));

        return parent::_prepareLayout();
    }
}