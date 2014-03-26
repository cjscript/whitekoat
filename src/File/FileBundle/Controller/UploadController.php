<?php

namespace File\FileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File\FileBundle\Models\Document;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UploadController extends Controller
{

    /**
     * @Route("/upload", name="file_file_homepage" )
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function uploadAction(Request $request)
    {
//        print 'app dir: ' .
        //              $this->get('kernel')->getRootDir() . '/../web' . $this->getRequest()->getBasePath();
        //    die();

        if ($request->getMethod() == 'POST')
        {
            $image = $request->files->get('img');
            $status = 'success';
            $uploadedURL = '';
            $message = '';
            if (($image instanceof UploadedFile) && ($image->getError() == '0'))
            {
                if (($image->getSize() < 2000000000))
                {
                    $originalName = $image->getClientOriginalName();
                    $name_array = explode('.', $originalName);
                    $file_type = $name_array[sizeof($name_array) - 1];
                    $valid_filetypes = array('jpg', 'jpeg', 'bmp', 'png');
                    if (in_array(strtolower($file_type), $valid_filetypes))
                    {
                        //Start Uploading File

                        $document = new Document();
                        $document->setFile($image);
                        $document->setSubDirectory('');
                        $document->processFile();
                        $uploadedURL = 'uploads' . DIRECTORY_SEPARATOR . $document->getSubDirectory() . DIRECTORY_SEPARATOR . $image->getBasename();
                        $uploadedURL = str_replace('\\\\', '/', $uploadedURL);
                    } else
                    {
                        $status = 'failed';
                        $message = 'Invalid File Type';
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
            return $this->render('FileFileBundle:Default:index.html.twig', array('status' => $status, 'message' => $message, 'uploadedURL' => $uploadedURL));
        } else
        {
            return $this->render('FileFileBundle:Default:index.html.twig');
        }
    }

}

?>
