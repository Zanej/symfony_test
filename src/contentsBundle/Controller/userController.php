<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace contentsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Description of userController
 *
 * @author zane2
 */
class userController extends Controller{
    
    
    public function getSezioni($doc, $livello){
        
        $doctrine = $doc;
        
        
        
        $repository_s = $doctrine->getRepository('contentsBundle:confSezioni');
        
        //print_r($repository_s);
        return $repository_s->findBy(array("livello"=>$livello,"stato"=>1), array("ordine"=>"ASC"));
    }
    
    /**
     * 
     * @param string $nome_utente Nome utente
     * @param integer $width Larghezza
     * @param integer $height Altezza
     * @param integer $id_utente Id utente
     * @return file
     */
    public function imgAction($name, $width, $height, $id_utente){
        
        $doctrine = $this->getDoctrine();
        
        //Trovo l'utente
        $repository_s = $doctrine->getRepository('contentsBundle:user');
        
        $utente = $repository_s->findOneBy(array("id"=>$id_utente));
        
        if($utente && is_object($utente)){
            
            $file_dir = "/img_users/".$id_utente."/".$utente->getUrlImg();
            $file_trovato = $this->get('kernel')->getRootDir()."/../web/img_users/".$id_utente."/".$utente->getUrlImg();
            
            if(file_exists($file_trovato)){
                
                $info = pathinfo($file_trovato);
                $extension = $info["extension"];
                $mime = mime_content_type ( $file_trovato);
                flush();
                ob_flush();
                
                
                $response = new Response($file_dir);
                
                $response->setStatusCode(Response::HTTP_OK);                
                
                $response->headers->set('Content-Type',$mime);                
                $response->headers->set('Cache-Control', 'private');
                $response->headers->set('Content-length', filesize($file_trovato));
                $response->headers->set('Content-Transfer-Encoding', 'binary');
                $response->headers->set('Pragma', 'no-cache');
                $response->headers->set('Expires', '0');
                
                $d = $response->headers->makeDisposition(
                    ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                    $name."-".$width."-".$height.".".$extension
                );
                
                $response->headers->set('Content-Disposition', $d);
                
                $response->setContent(file_get_contents($file_trovato));
                
//                $response->sendHeaders();
//                $response->sendContent();
                
                return $response;
                
            }else{
                
                throw $this->createNotFoundException('Image not found');
            }
            
        }else{
            
            throw $this->createNotFoundException('Image not found');
        }
    }
        
    public function getImgUrl($name, $width, $height, $id_utente){
        
        $file_trovato = $this->get('kernel')->getRootDir()."/../web/img_users/".$id_utente."/".$utente->getUrlImg();

        if(file_exists($file_trovato)){
            
            return "/users_images/".$name."-".$width."-".$height."-".$id_utente."/";
        }
            
        return "/images/img.php";        
    }
    //put your code here
}
