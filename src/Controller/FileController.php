<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileController extends AbstractController
{
    /**
     * @Route("/file", name="file")
     */
    public function index()
    {
        return $this->render('file/form.html.twig');
    }

    /**
     * @Route("/handleUpload", name="handleUpload")
     */
    public function handleUpload(Request $request)
    {

        $file = $request->files->get('image');
        $path = $this->getParameter('kernel.project_dir').'/public/uploads';
        $nameFile = uniqid().'-'.$file->getClientOriginalName();
        $file->move($path, $nameFile);
        dd($request);
    }

}
