<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AxonMedicine\WhiteKoatBundle\Model\Document;
use AxonMedicine\WhiteKoatBundle\Utils\Importer\DrugDataImporter\DrugDataParser;
use AxonMedicine\WhiteKoatBundle\Utils\Importer\DrugDataImporter\AliasDataParser;
use AxonMedicine\WhiteKoatBundle\Utils\Importer\DrugDataImporter\DiseaseDataParser;

/**
 * This is the main controller for home page and all links in menu.
 *
 * @Route("/dimpc")
 */
class ImportDrugDataController extends GenericController
{

    /**
     * @Route("/g", name="import_route_get" )
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function retrieveAction(Request $request)
    {
//        print 'app dir: ' .
        //              $this->get('kernel')->getRootDir() . '/../web' . $this->getRequest()->getBasePath();
        //    die();

        $session = $this->getRequest()->getSession();

        // always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');

            return $this->render('AxonMedicineWhiteKoatBundle:Default:import.drug.data.html.twig', array('name' => $loginInfo->getUsername()));
        }
    }

    /**
     * @Route("/u", name="import_route_upload" )
     * @Method({"POST"})
     * @param request the request
     * @return type
     */
    public function uploadAction(Request $request)
    {
        $session = $request->getSession();

        // always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $file = $request->files->get('img');

            $message = 'Invalid File';

            $validFiletypes = array('xls', 'xlsx');

            $status = $this->upload($request, $file, $message, $uploadedURL, $validFiletypes);

            if ($status == 'success')
            {
                // process file.
                $this->process($file, $uploadedURL);
            }
            $session->getFlashBag()->add('notice', $message);
            $loginInfo = $session->get('logininfo');

            return $this->render('AxonMedicineWhiteKoatBundle:Default:import.drug.data.html.twig', array('name' => $loginInfo->getUsername(), 'status' => $status, 'message' => $message, 'uploadedURL' => $uploadedURL));
        }
    }

    private function refreshDb($script)
    {
        $vals['db_host'] = '127.0.0.1';
        $vals['db_user'] = 'root';
        $vals['db_pass'] = '<enter password here>';
        $vals['db_pass'] = '45drTweXsit24E3';
        $vals['db_name'] = 'whitekoat';

        $command = 'mysql'
                . ' --host=' . $vals['db_host']
                . ' --user=' . $vals['db_user']
                . ' --password=' . $vals['db_pass']
                . ' --database=' . $vals['db_name']
                . ' --execute="SOURCE ' . $script . '"';
        $output = shell_exec($command);
    }

    private function process($original, $new)
    {
        $this->refreshDb('<enter path to whitekoat script>');
		// parse alias data...
        $this->refreshDb('/Database/wk_db82332_1Qxdf/whitekoat.sql');
		// parse alias data...


        (new AliasDataParser($this))->parse($original, $new);
        // parse drug data...
        (new DrugDataParser($this))->parse($original, $new);
        // parse disease data...
        (new DiseaseDataParser($this))->parse($original, $new);
    }

    private function upload($request, $file, &$message, &$uploadedURL, $valid_filetypes)
    {
        $status = 'success';
        $uploadedURL = '';
        $message = '';
        if (($file instanceof UploadedFile) && ($file->getError() == '0'))
        {
            if (($file->getSize() < 2000000000))
            {
                $originalName = $file->getClientOriginalName();
                $name_array = explode('.', $originalName);
                $file_type = $name_array[sizeof($name_array) - 1];
                if (in_array(strtolower($file_type), $valid_filetypes))
                {
                    //Start Uploading File
                    $document = new Document();
                    $document->setFile($file);
                    $document->setSubDirectory('');
                    $document->processFile();
                    $uploadedURL = 'uploads' . DIRECTORY_SEPARATOR . $document->getFilePersistencePath();
                    $uploadedURL = str_replace('\\\\', '/', $uploadedURL);
                    $message = 'File ' . $file->getClientOriginalName() . "  uploaded and imported.";
                } else
                {
                    $status = 'failed';
                    $message = 'Invalid File Type.  Supports the following types: ' . implode(',', $valid_filetypes);
                }
            } else
            {
                $status = 'failed';
                $message = 'Size exceeds limit';
            }
        } else
        {
            $status = 'failed';
            $message = 'File Error';
        }
        return $status;
    }

}

?>
