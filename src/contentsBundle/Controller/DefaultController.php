<?php

namespace contentsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DefaultController extends Controller
{
    public function indexAction()
    {   
        
        //Controllo se l'utente è loggato
        
        $securityContext = $this->container->get('security.authorization_checker');
        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            
            return $this->loginAction();            
        }        
        
        //Ottengo il token dell'utente attualmente loggato
        
        $session = $this->get('session');
        $token = unserialize($session->get('_security_'.'main'));
        
        //Username dell'utente attualmente loggato
        $username = $token->getUsername();
        
        //Repository utenti
        $repository_users = $this->getDoctrine()->getRepository("contentsBundle:user");
        
        /*
         * @var contentsBundle\Entity\User $utente;
         */
        $utente = $repository_users->findOneBy(array("username"=>$username));
                
        //Trovo le sezioni abilitate
        $sezioni = $utente->getSezioni($this->getDoctrine());
        $sezioni_gruppi_sez = array();
        $sezioni_gruppi = array();
        
        foreach($sezioni as $kt => $vt){
            
            $index_gruppo = $vt->getIdGruppo()->getId();
            if(! isset( $sezioni_gruppi[$index_gruppo] )){
                                
                $sezioni_gruppi[$index_gruppo] = $vt->getIdGruppo();                
                $sezioni_gruppi_sez[$index_gruppo] = array();
            }
            
            $sezioni_gruppi_sez[$index_gruppo][] = $vt;            
        }
        
//        print_r($sezioni_gruppi_sez);
                
        
        return $this->render('contentsBundle:Default:index.html.twig',
                array("sezioni_gruppi"=>$sezioni_gruppi, "sezioni_gruppi_sez"=>$sezioni_gruppi_sez, "user" => $utente));
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
            $token = new UsernamePasswordToken($user->getUsername(), $password, 'main', array('ROLE_ADMIN'));            
            
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
