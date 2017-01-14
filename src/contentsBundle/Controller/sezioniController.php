<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace contentsBundle\Controller;
use \Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of sezioniController
 *
 * @author zane2
 */
class sezioniController extends Controller{
    
    private $sezione;
    protected $container;
    
    public function __construct($container, $sezione){
               
        $this->container = $container;
        $this->sezione = $sezione;
        
    }
    
    /**
     * Gestisce gli elementi della sezione, inn base ai filtri
     * @param array $filtri
     * @param integer $page se settata, viene utilizzato per il paginatore in lista
     * @param integer $limit se settato, viene utilizzato per limitare la query
     * @return array
     */
    public function getConfTables($filtri = array(), $page = NULL, $limit= NULL){
                
        //Repository conf table
        $repository_conf = $this->getDoctrine()->getRepository("contentsBundle:confTable");
        
        $arr_params = $repository_conf->findBy( 
                array("idSezione"=>$this->sezione->getIdSezione(), "stato"=> 1, "view_scheda" => 1),
                array("ordine"=>"ASC")
        );
        
        //Nome del bundle        
        $bundle = $this->sezione->getBundle() ? $this->sezione->getBundle() : "contentsBundle:".$this->sezione->getTabella();
                
        $repository_b = $this->getDoctrine()->getRepository($bundle);
        
        $arr_trovati = array();
                
        //Guardo se i campi esistono effettivamente nella tabella
        
        foreach($arr_params as $ks => $vs){
            
            if($repository_b->fieldExists( str_replace("_","",$vs->getField())) ){
                
                $arr_trovati[$vs->getField()] = $vs;
            }
        }
        
        $arr_collegati = array();
        //Controllo se tra i campi ci sono entità collegate
        foreach($arr_trovati as $kt => $vt){
            
            //Il comment non deve essere null
            if( !is_null($comment = $vt->getComment()) && trim($comment) != ""){
                
                if(substr($comment,0, strlen("ID_COLLEGATO")) == "ID_COLLEGATO"){
                                        
                    
                    $arr_collegati[$kt] = $vt;
                    
                }
            }
        }
        
        /*
         * @todo Filtri
         */
        if(count($filtri) > 0){
            
        }
        
        $filtri["idSezione"] = $this->sezione->getIdSezione();
        
        if( isset($page)){
            
            $filtra = $repository_b->findBy(
                $filtri, array("ordine"=>"ASC"), $this->sezione->getPerPage(), ($page - 1) * $this->sezione->getPerPage());
        }elseif(isset($limit)){
            
            $filtra = $repository_b->findBy(
                $filtri, array("ordine"=>"ASC"), $limit);
        }else{
            
            $filtra = $repository_b->findBy(
                $filtri, array("ordine"=>"ASC"));
        }
        
        
        
        foreach($filtra as $kt => $vt){
            
            //Controllo che ci siano collegati, in questo caso li tiro fuori
            if(count($arr_collegati) > 0){
                
                //Ciclo i collegati
                foreach($arr_collegati as $kc => $vc){
                    
                    //Nome della funzione
                    $nomeFunzione = "get".str_replace(" ","",ucwords(str_replace("_"," ",$kc)));
                    
                    if(!is_null( ($campo_t = $vt->$nomeFunzione()) ) && ($campo_t != "")){
                        
                        //Commento di quel campo
                        $comment = $vc->getComment();
                        
                        if(substr($comment,0,strlen("ID_COLLEGATO")) == "ID_COLLEGATO"){
                            
                            //Trovo i parametri
                            $parametri = explode("#",$comment);
                            
                            $bundle_t = $parametri[1];
                            $idSezione = $parametri[2];
                            $where_tot = explode(";", $parametri[3]);
                            $campi_stampa = explode(";", $parametri[4]);
                            
                            $where = array();
                            
                            //I where sono separati da ;, a loro volta da |
                            foreach($where_tot as $kw => $vw){
                                                                
                                $param = explode("|",$vw);
                                $where[$param[0]] = $param[1];
                            }
                            
                            $rep = $this->getDoctrine()->getRepository($bundle_t);
                            
                            $tutti = $rep->findBy(array("idSezione"=>$idSezione));
                            
                            //Li ciclo tutti per associarli all'edit
                            $tutti_arr = array();
                            
                            foreach($tutti as $ka => $va){
                                
                                foreach($campi_stampa as $ks => $vs){
                                    
                                    $nomeFunz = "get".str_replace(" ","",ucwords(str_replace("_"," ",$vs)));
                                    
                                    if(!isset($tutti_arr[$va->getId()]))
                                        $tutti_arr[$va->getId()] = "";
                                    
                                    $tutti_arr[$va->getId()] .= $va->$nomeFunz()." ";

                                }
                                
                            }
                            
                            $vc->tuttiCollegati = $tutti_arr;
                            //Trovo il correlato
                            $trova = $rep->findOneBy(array("id"=>$campo_t));
                            
                            if(!isset($vt->campi_veri))
                                $vt->campi_veri = array();
                            
                            //Se esiste lo assegno a "campi_veri"
                            if(!is_null($trova) && is_object($trova)){                            
                            
                                //Campi stampa
                                foreach($campi_stampa as $ks => $vs){
                                    
                                    $nomeFunz = "get".str_replace(" ","",ucwords(str_replace("_"," ",$vs)));
                                    
                                    if(!isset($vt->campi_veri[$nomeFunzione]))
                                        $vt->campi_veri[$nomeFunzione] = "";
                                    
                                    $vt->campi_veri[$nomeFunzione].= $trova->$nomeFunz()." ";

                                }
                            }
                        }
                    }
                        
                }
            }
            
            
            //Tiro fuori i campi realmente necessari
            
            if(count($arr_trovati) > 0){
                
                //Ciclo
                foreach($arr_trovati as $kc => $vc){
                    
                    $nomeFunzione = "get".str_replace(" ","",ucwords(str_replace("_"," ",$vc->getName())));
                    $nomeFunzioneOrig = "get".str_replace(" ","",ucwords(str_replace("_"," ",$kc)));
                    
                    $nomeFunzioneSet = "set".str_replace(" ","",ucwords(str_replace("_"," ",$vc->getName())));
                    $nomeFunzioneSetOrig = "set".str_replace(" ","",ucwords(str_replace("_"," ",$kc)));
                    
                    if($nomeFunzione != $nomeFunzioneOrig && $kc != $vc->getName()){
                        //Creo la funzione nuova (vedi la definizione dentro la classe contents)

                        $vt->$nomeFunzione = function($nomeFunzioneOrig){                        
                            
                            if(isset($this->campi_veri[$nomeFunzioneOrig])){                                                                
                                
//                                var_dump($this);
                                
                                return array(
                                    "valore"=>$this->$nomeFunzioneOrig(),
                                    "stampa"=>$this->campi_veri[$nomeFunzioneOrig]);
                            }

                            return $this->$nomeFunzioneOrig();
                        };

                        if(!isset($vt->metodi))
                            $vt->metodi = array();

                        //Assegno ai metodi, in modo da poter usare il get
                        $vt->metodi[$nomeFunzione] = $nomeFunzioneOrig;         
                        $vt->metodi[$nomeFunzioneSet] = $nomeFunzioneSetOrig;         
                        
                    }
                    //Ottengo il tipo della variabile, in caso mi servisse
                    
                    $em = $this->getDoctrine()->getManager();                                        
                    
                    $nomeCampoOrig = str_replace(" ","",ucwords(str_replace("_"," ",$kc)));                                        
                    $nomeCampoOrig = strtolower($nomeCampoOrig[0]).substr($nomeCampoOrig,1);
                                  
                    $vc->typeOfField = $em->getClassMetaData($bundle)->getTypeOfField($nomeCampoOrig);
                    
                    $vt->campi_real[$vc->getName()] = $vc->getField();
                }
                
                //Creo anche la funzione get
                $vt->get = function($label){
                    
                    $nomeFunzione = "get".str_replace(" ","",ucwords(str_replace("_"," ",$label)));
                    if(isset($this->metodi[$nomeFunzione])){
                        
                        return $this->$nomeFunzione( $this->metodi[$nomeFunzione]);
                    }elseif( method_exists($this, $nomeFunzione)){
                        
                        return $this->$nomeFunzione();
                    }
                    
                    return null;                    
                };
                
                //Creo la funzione set
                
                $vt->set = function($label, $set){
                    
                    $nomeFunzione = "set".str_replace(" ","",ucwords(str_replace("_"," ",$label)));
                    if(isset($this->metodi[$nomeFunzione])){
                        
                        return $this->$nomeFunzione( $set );
                    }elseif( method_exists($this, $nomeFunzione)){
                        
                        return $this->$nomeFunzione ( $set);
                    }
                    
                    return null;                    
                };
                                
            }
        
            $filtra[$kt] = $vt;
        }
        
        //Trovo quelli che vanno in lista
        $arr_lista = array();
        foreach($arr_trovati as $kt => $vt){
            
            if($vt->getViewDetail() == 1){                                
                $arr_lista[] = $vt;
            }
        }
        
//        var_dump($arr_trovati);
        
        return array(
            "record"=>$filtra,
            "campi"=>$arr_trovati,
            "collegati"=>$arr_collegati,
            "lista"=>$arr_lista
        );
    }
    
    
    /**
     * @TODO
     * @param type $sezione
     * @param type $rif_box
     */
    public function getBoxSezione($sezione, $rif_box = NULL) {
        
        $repository_conf = $this->getDoctrine()->getRepository('conf_sezioni_box_configRepository');
        $repository_box = $this->getDoctrine()->getRepository('conf_sezioni_boxRepository');
        
    }
}
