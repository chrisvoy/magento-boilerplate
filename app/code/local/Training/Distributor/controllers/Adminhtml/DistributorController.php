<?php

class Training_Distributor_Adminhtml_DistributorController
    extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')
            ->isAllowed('catalog/training_distributor');
    }

    public function indexAction()
    {
        /*
         * Redirect user via 302 http redirect (the browser url changes)
         */
        $this->_redirect('*/*/list');
    }

    /**
     * Display grid
     */
    public function listAction()
    {
        $this->_getSession()->unsFormData();

        $this->_title($this->__('Catalog'))->_title($this->__('Distributors'));

        $this->loadLayout();

        $this->_setActiveMenu('catalog/training_distributor');

        $this->renderLayout();
    }

    /**
     * Grid action for ajax requests
     */
    public function gridAction()
    {
        $this->loadLayout(false);
        $this->renderLayout();
    }

    /**
     * Export grid to CSV format
     */
    public function exportCsvAction()
    {
        $fileName   = 'distributors.csv';
        $content    = $this->getLayout()->createBlock('training_distributor/adminhtml_distributor_grid')
            ->getCsvFile();

        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     * Export grid to XML format
     */
    public function exportXmlAction()
    {
        $fileName   = 'distributors.xml';
        $content    = $this->getLayout()->createBlock('training_distributor/adminhtml_distributor_grid')
            ->getExcelFile();

        $this->_prepareDownloadResponse($fileName, $content);
    }

    public function newAction()
    {
        /*
         * Redirect the user via a magento internal redirect
         */
        $this->_forward('edit');
    }

    /**
     * Create or edit distributor
     */
    public function editAction()
    {
        $model = Mage::getModel('training_distributor/distributor');
        Mage::register('current_distributor', $model);
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No record with ID "%s" found.', $id));
                }
            }

            /*
             * Build the page title
             */
            if ($model->getId()) {
                $pageTitle = $this->__('Edit %s (%s)', $model->getName(), $model->getId());
            } else {
                $pageTitle = $this->__('New Distributor');
            }
            $this->_title($this->__('Catalog'))->_title($this->__('Distributors'))->_title($pageTitle);

            $this->loadLayout();

            $this->_setActiveMenu('catalog/training_distributor');

            $this->renderLayout();
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->_redirect('*/*/list');
        }
    }

    /**
     * Process form post
     */
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            $this->_getSession()->setFormData($data);
            $model = Mage::getModel('training_distributor/distributor');
            $id = $this->getRequest()->getParam('id');

            try {
                if ($id) {
                    $model->load($id);
                }
                $model->addData($data)->save();

                $this->_getSession()->addSuccess($this->__('Distributor was successfully saved'));
                $this->_getSession()->unsFormData();

                if ($this->getRequest()->getParam('back')) {
                    $params = array('id' => $model->getId());
                    $this->_redirect('*/*/edit', $params);
                } else {
                    $this->_redirect('*/*/list');
                }
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                if ($model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/new');
                }
            }

            return;
        }

        $this->_getSession()->addError($this->__('No data found to save'));
        $this->_redirect('*/*');
    }

    /**
     * Delete distributor entity
     */
    public function deleteAction()
    {
        $model = Mage::getModel('training_distributor/distributor');
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No record with ID "%s" found.', $id));
                }
                $name = $model->getName();
                $model->delete();
                $this->_getSession()->addSuccess($this->__('"%s" (ID %d) was successfully deleted', $name, $id));
            }
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
        }

        $this->_redirect('*/*');
    }

    public function deleteMassAction()
    {
        $data = $this->getRequest()->getPost('distributors');
        if ($data) {
            try {
                $num = 0;
                $model = Mage::getModel('training_distributor/distributor');
                foreach ((array)$data as $id) {
                    $model->setId($id)->delete();
                    $num++;
                }
                $this->_getSession()->addSuccess(
                    $this->__('Deleted %s distributor(s)', $num)
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                Mage::logException($e);
            }
        }

        $this->_redirect('*/*/index');
    }
}