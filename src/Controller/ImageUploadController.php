<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageUploadController extends AbstractController
{
    /**
     * @Route("/imge-upload/{dir}", name="imagesUpload", methods={"POST"})
     * @param string $dir
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse|Response
     */
    public function uploadImage($dir, Request $request) {
        $fileSystem = new Filesystem();
        $directory = $this->getParameter('kernel.project_dir'). '/public/images/'.$dir;
        if (!is_dir($directory)) {
            $fileSystem->mkdir($directory);
        }

        $response = [];
        foreach ($request->files as $key => $file){
            try {
                $file->move(
                    $directory,
                    $file->getClientOriginalName()
                );

                $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                        "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                        $this->generateUrl('getImages', ["dir" => $dir, "path" => $file->getClientOriginalName()]);

                if (preg_match('/(before)/', $key)) {
                    $response[] = [
                        "before" => $url,
                        "after" => '',
                    ];
                } elseif (preg_match('/(after)/', $key)) {
                    $lastIndex = sizeof($response) - 1;
                    $last = $response[$lastIndex];
                    if (isset($last['before'])) {
                        $response[$lastIndex]['after'] = $url;
                    }
                } else {
                    $response[] = $url;
                }
            } catch (FileException $e) {
                return $this->json($e->getMessage(), $e->getCode());
            }
        }
        // Move the file to the directory where brochures are stored

        return $this->json($response);
    }

    /**
     * @Route("/image/{dir}/{path}", name="getImages")
     * @param $dir
     * @param $path
     * @return BinaryFileResponse|Response
     */
    public function getImage($dir, $path)
    {
        $file = $this->getParameter('kernel.project_dir').'/public/images/'.$dir.'/'.$path;
        if (file_exists($file))
        {
            return new BinaryFileResponse($file);
        }
        return new Response("Image not found", 404);
    }
}
