<?php

namespace contentsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DefaultController extends Controller
{
    private static $user;
    
    public function indexAction()
    {   
        
        //Check utente loggato
        $utente = $this->getUserLogged();                
        
        if($utente == false){
            
            return $this->loginAction();
        }
                
        //Trovo le sezioni abilitate
        $sez_arr = $this->getSezioniGruppi();
        
        
        return $this->render('contentsBundle:Default:index.html.twig',
                array("sezioni_gruppi"=>$sez_arr['sezioni_gruppi'], "sezioni_gruppi_sez"=>$sez_arr['sezioni_gruppi_sez'], "user" => $utente));
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
    
    public function listAction($sezione){               
        
        //Check utente loggato
        $utente = $this->getUserLogged();
        
        if($utente == false){
            
            return $this->loginAction();
        }
        
        //Trovo le sezioni abilitate
        $sez_arr = $this->getSezioniGruppi();
        
        $sez_sel = array();
        
        $trovato = false;
        
        foreach($sez_arr["sezioni"] as $ks => $vs){
            
            if($vs->getIdSezione() == $sezione){
                
                $sez_sel = $vs;
                $trovato = true;
                break;
            }            
        }
        
        if(!$trovato){
            
            return $this->indexAction();
        }
        
        $confT = $this->trovaContenuti($sez_sel);
        
        $arr_passa = array(
            "sezioni_gruppi"=>$sez_arr['sezioni_gruppi'] , 
            "sezioni_gruppi_sez"=>$sez_arr['sezioni_gruppi_sez'],
            "user"=>self::$user,
            "sez_sel"=>$sez_sel,
            "lista"=>$confT["record"],
            "campi_lista"=>$confT["lista"],
            "campi"=>$confT["campi"],
            "collegati"=>$confT["collegati"]
        );
        
//        var_dump($arr_passa);
        
        return $this->render("contentsBundle:Default:list.html.twig", 
                $arr_passa
        );
        
        
    }
    
    public function cambiaStatoAction($sezione, $id_content){
        /**
         * @todo Tutto
         */
    }
    
    /**
     * Restituisce l'utente loggato se presente, o FALSE se non sono presenti utenti loggati     
     */
    public function getUserLogged(){
        
        //Controllo se l'utente è loggato
        
        $securityContext = $this->container->get('security.authorization_checker');
        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            
            return false;         
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
        
        if(is_object($utente)) self::$user = $utente;
        
        return is_object($utente) ? $utente : false;
    }
    
    /**
     * Ritorna i gruppi delle sezioni, associativi (con le sezioni) e non
     * @return array(sezioni_gruppi => gruppi, sezioni_gruppi_sez => sezioni raggruppate per gruppo, sezioni => sezioni)
     */
    public function getSezioniGruppi(){
        
        
        $sezioni = self::$user->getSezioni($this->getDoctrine());
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
        
        return array("sezioni_gruppi"=>$sezioni_gruppi,"sezioni_gruppi_sez"=>$sezioni_gruppi_sez, "sezioni"=>$sezioni);
    }    
    
    public function getContainer(){
        
        return $this->container;
    }
    
    /**
     * Trova i contenuti per la sezione selezionata
     * @param confSezioni $sezione
     * @return array
     */
    public function trovaContenuti($sezione){
        
        $controller = new sezioniController($this->getContainer(), $sezione);        
        
        return $controller->getConfTables();
    }
}
