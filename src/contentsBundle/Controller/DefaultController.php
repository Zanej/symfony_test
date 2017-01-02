<?php

namespace contentsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {   
        
        //Controllo se l'utente è loggato
        
        $securityContext = $this->container->get('security.authorization_checker');
        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            
            return $this->loginAction();            
        }        
        
        return $this->render('contentsBundle:Default:index.html.twig');
    }

    public function loginAction(){
        
        //Se sono settati mail e password, provo a loggarmi
        
        if(isset($_POST['email']) && isset($_POST["password"])){
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            //User manager
            $userManager = $this->get('fos_user.user_manager');
            $entityManager = $this->get('doctrine')->getManager();
            $session = $this->get('session');
            
            //Cerco se è presente la mail
            $user = $userManager->findUserByEmail($email);
            
            if(!isset($user) || !$user){
                echo json_encode(array("error"=>"Utente inesistente o password non corretta"));
                exit;
            }
                        
            
            //Se è presente continuo
            
            //Token di accesso
            $token = new \Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken($user->getUsername(), $password, 'main', array('ROLE_ADMIN'));            
            
            //print_r($session);
            //echo serialize($token);
            //exit;
            
            $session->set('_security_'.'main', serialize($token));
                        
            
            $session->save();
            
            
            $cookie = new \Symfony\Component\BrowserKit\Cookie($session->getName(), $session->getId(), time() + 7200, '/articms/');                                    
                        
            $securityContext = $this->container->get('security.authorization_checker');
            if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                echo json_encode(array("error"=>"Utente inesistente o password non corretta"));
                exit;
                //return $this->loginAction();            
            }else{
                echo json_encode(array("success"=>"Login effettuato con successo"));
                exit;
            } 
            
        }
        
    	return $this->render('contentsBundle:Default:login.html.twig');
    }
}
