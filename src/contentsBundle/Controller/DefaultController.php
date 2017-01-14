<?php

namespace contentsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Request;

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
        $request = Request::createFromGlobals();


        if($request->request->has('email') && $request->request->has('password')){

            $email = $request->request->get('email');
            $password = $request->request->get('password');

            //User manager
            $userManager = $this->get('fos_user.user_manager');
            $entityManager = $this->get('doctrine')->getManager();
            $session = $this->get('session');

            //Cerco se è presente la mail
            $user = $userManager->findUserByEmail($email);

            if(!isset($user) || !$user){
                return $this->jsonOrNormal(array("error"=>"Utente inesistente o password non corretta","message"=>"Utente inesistente o password non corretta"), 403);                
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
                return $this->jsonOrNormal(array("error"=>"Utente inesistente o password non corretta", "message" => "Utente inesistente o password non corretta"), 403);                
                //return $this->loginAction();
            }else{
                return $this->jsonOrNormal(array("success"=>"Login effettuato con successo", "message" => "Login effettuato con successo"));                
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
    /**
     * Cambia stato all'elemento selezionato
     * @param integer $sezione id sezione
     * @param integer $id_content id content
     */
    public function cambiaStatoAction($sezione, $id_content, $stato = 1){

        //Check utente loggato
        $utente = $this->getUserLogged();

        if($utente === false)
            return $this->jsonOrNormal(array("error"=>"Not logged", "message" => "Not logged"), 403);

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

        if(!$trovato)
            return $this->jsonOrNormal(array("error"=>"Not authorized", "message" => "Not authorized"), 403);

        //Trovo il bundle
        $bundle = $sez_sel->getBundle() ? $sez_sel->getBundle() : "contentsBundle:".$sez_sel->getTabella();

        //Trovo il repository
        $rep = $this->getDoctrine()->getRepository($bundle);

        //Trovo l'elemento
        $elem = $rep->findOneBy(array($sez_sel->getKeyField()=>$id_content));

        if(!is_null($elem)){

            $elem->setStato($stato);
            //            $elem->persist();

            $em = $this->getDoctrine()->getManager();

            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($elem);

            // actually executes the queries (i.e. the INSERT query)
            $em->flush();

            $href = $stato == 1 ? ("/articms/lock/".$sezione."/".$id_content) : ("/articms/unlock/".$sezione."/".$id_content);
            return $this->jsonOrNormal(array("success"=>"true","stato"=>$stato,"href"=>$href, "message" => "Operazione eseguita"));

        }else{
            return $this->jsonOrNormal(array("error"=>"Not authorized", "message" => "Not authorized"), 403);
        }

    }

    /**
     * Genera il form di modifica di un content
     * @param integer $sezione id sezione
     * @param integer $id_content id content
     * @return render
     */
    public function editAction($sezione, $id_content){
        //Check utente loggato
        $utente = $this->getUserLogged();

        if($utente === false)
            return $this->jsonOrNormal(array("error"=>"Not logged", "message" => "Not logged"), 403);

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

        if(!$trovato)
            return $this->jsonOrNormal(array("error"=>"Not authorized", "message" => "Not authorized"), 403);



        //Trovo l'elemento
        $parametri_sezione = $this->trovaContenuti($sez_sel,array($sez_sel->getKeyField()=>$id_content), NULL, 1);

        if(!is_null($parametri_sezione['record']) && is_array($parametri_sezione['record']) && count($parametri_sezione['record']) > 0){

            $elem = $parametri_sezione['record'][0];

            $arr_passa = array(
                "sezioni_gruppi"=>$sez_arr['sezioni_gruppi'] ,
                "sezioni_gruppi_sez"=>$sez_arr['sezioni_gruppi_sez'],
                "user"=>self::$user,
                "sez_sel"=>$sez_sel,
                "elem"=>$elem,
                "campi_lista"=>$parametri_sezione["lista"],
                "campi"=>$parametri_sezione["campi"],
                "collegati"=>$parametri_sezione["collegati"]
            );


            return $this->render("contentsBundle:Default:edit.html.twig",
                    $arr_passa
            );
        }
        
        return $this->jsonOrNormal(array("error"=>"Not found"), 404);
    }

    public function editFormAction($sezione, $id_content){

        $user = $this->getUserLogged();

        if($user == false)
            return ( $this->jsonOrNormal(array("success" => "false", "message" => "Not logged"), 403));


        $sez_sel = $this->getSezione($sezione);

        if($sez_sel == false)
            return ( $this->jsonOrNormal(array("success" => "false", "message" => "Not Authorized"), 403));

        //Trovo l'elemento
        $parametri_sezione = $this->trovaContenuti($sez_sel,array($sez_sel->getKeyField() => $id_content), NULL, 1);
        
        $campi = $parametri_sezione['campi'];
        
        //Controllo che il record esista effettivamente
        if(!is_null($parametri_sezione['record']) && is_array($parametri_sezione['record']) && count($parametri_sezione['record']) > 0){
            
            //Ottengo i parametri in post
            $request = Request::createFromGlobals();
            $post_p = $request->request->all();

            $record = $parametri_sezione['record'][0];
                        
            
            try{
                
                //Ciclo i parametri in post
                
                foreach($post_p as $kp => $vp){
                    
                    //Trovo il nome della funzione per settare i campi
                    $nomeFunz = $this->nomeMetodo($kp,'set');

                    $metodo_usa = $this->nomeMetodo($kp, 'set');
                    
                    //Se è un alias, prendo quello
                    if(isset($record->metodi[$nomeFunz])){

                        $metodo_usa = $record->metodi[$nomeFunz];
                    }
                    //Non faccio il set se è il campo chiave
                    if($metodo_usa != $this->nomeMetodo($sez_sel->getKeyField(), 'set')){
                        
                        //Controllo il tipo della variabile
                        if( isset( $record->campi_real[$kp] ) ){

                            $nome_campo_orig = $record->campi_real[$kp];

                            $tipo_campo = $campi[$nome_campo_orig]->typeOfField;                            
                        }
                        
                        if( isset($tipo_campo) && $tipo_campo == 'datetime'){
                            
                            $vp = new \DateTime($vp);
                        }
                    
                        
                        $record->$metodo_usa($vp);

                    }

                }
//                exit;
                $em = $this->getDoctrine()->getManager();

                // tells Doctrine you want to (eventually) save the Product (no queries yet)
                $em->persist($record);

                // actually executes the queries (i.e. the INSERT query)
                $em->flush();
                return ( $this->jsonOrNormal(array("success" => "true", "message" => "Modifiche eseguite")));
            } catch (Exception $ex) {
                
                error_log($ex->getMessage());                
                return ( $this->jsonOrNormal(array("success" => "false", "message" => "Network error"), 403));
            }
        }else
            return  $this->jsonOrNormal(array("success" => "false", "message" => "Record not found"), 404);
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
     * @param array $filtri filtri
     * @param integer page, page
     * @param integer limit, se è 1 ritorna un findOneBy
     * @return array
     */
    public function trovaContenuti($sezione, $filtri = array(), $page = NULL, $limit = NULL){

        $controller = new sezioniController($this->getContainer(), $sezione);

        return $controller->getConfTables($filtri, $page, $limit);
    }

    /**
     * Controlla se una sezione è accessibile dall'utente loggato
     * @param integer $sezione
     * @return FALSE se non è accessibile, l'elemento sezione se lo è
     */
    public function getSezione($sezione){
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

        if(!$trovato)
            return false;

        return $sez_sel;
    }

    /**
     * Ritorna il nome del metodo per questo campo
     * @param string $nomeCampo
     * @param enum('get','set') $tipo
     * @return nome metodo
     */
    public function nomeMetodo($nomeCampo, $tipo='get'){
        return $tipo.str_replace(" ","",ucwords(str_replace("_"," ",$nomeCampo)));
    }
    
    public function jsonOrNormal($message, $status = 200, $headers = array(), $context = null){
                
        $request = Request::createFromGlobals();
        
        if($request->isXmlHttpRequest()){
            
            return $this->json($message, $status, $headers, $context);
        }
        
        return new \Symfony\Component\HttpFoundation\Response($message['message'], $status, $headers);
    }
}
