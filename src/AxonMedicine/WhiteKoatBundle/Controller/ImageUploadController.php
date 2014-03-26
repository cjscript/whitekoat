<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AxonMedicine\WhiteKoatBundle\Model\Document;

/**
 * This is the main controller for image uploads.
 * 
 * @Route("/") 
 */
class ImageUploadController extends GenericController
{

    private $UPLOAD_DIRECTORY = 'uploads';
    private $IMAGES_DIRECTORY = 'images_3921343193822';

    /**
     * @Route("/imgtagg", name="img_route_get" )
     */
    public function retrieveAction(Request $request)
    {
        $session = $request->getSession();

        // always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');

            $libs = $this->drugCardService()->getLibs();

            $imageLibs = $this->typeLibService()->getImageLibs();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:image.lib.html.twig', array('name' => $loginInfo->getUsername(), 'libs' => $libs, 'imageLibs' => $imageLibs));
        }
    }

    /**
     * @Route("/imgtagsv", name="image_route_save" )
     * @Method({"POST"})
     * @param request the request
     * @return type
     */
    public function saveImageLibTagAction(Request $request)
    {

        $session = $request->getSession();

        // always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');

            $file = $request->files->get('img');

            $libIds = $request->get('libraryIds');

            $message = 'Invalid File';

            $validFiletypes = array('jpeg', 'jpg', 'gif', 'tif');

            $status = $this->upload($request, $file, $message, $uploadedURL, $validFiletypes);

            if ($status == 'success')
            {
                // process file.
                $this->process($file, $uploadedURL, $libIds, $loginInfo->getUsername());
            }
            $session->getFlashBag()->add('notice', $message);

            $libs = $this->drugCardService()->getLibs();

            $imageLibs = $this->typeLibService()->getImageLibs();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:image.lib.html.twig', array('name' => $loginInfo->getUsername(), 'status' => $status, 'libs' => $libs, 'imageLibs' => $imageLibs));
        }
    }

    private function process($original, $uploadedURL, $libIds, $userName)
    {

        $originalName = $original->getClientOriginalName();
        $extension = explode('.', $originalName)[1];

        $image = $this->typeLibService()->saveImage($originalName, $extension, $libIds, $userName);

        $newFileURL = $this->IMAGES_DIRECTORY . DIRECTORY_SEPARATOR . $image->getId();
        $newFileURL = str_replace('\\\\', '/', $newFileURL);

        rename($uploadedURL, $newFileURL);

        // create a thumbnail for later view.
        $this->createThumbnail($newFileURL, $newFileURL.'_thmb', 60);
    }

    private function createThumbnail($src, $dest, $desired_width)
    {
        // load image and get image size
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        // calculate thumbnail size
        $desired_height = floor($height * ($desired_width / $width));

        // create a new, "virtual" image
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        // copy source image at a resized size
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        // create the physical thumbnail image to its destination
        imagejpeg($virtual_image, $dest);
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
                    $uploadedURL = $this->UPLOAD_DIRECTORY . DIRECTORY_SEPARATOR . $document->getFilePersistencePath();
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
