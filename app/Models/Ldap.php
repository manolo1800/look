<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ldap extends Model
{

  public $host = '161.196.109.147';

  public $port = 389;

  public $ou = array('Proyectos Mayores');

  public $ouUsuario = array('DATA');

  public $ouRol = array('Siscolvir','Grupos');

  public $dc = array('labcantv','com','ve');

  public $user = "_pmayores@labcantv.com.ve";

  public $password = "Cantv2020";


  public function VerifiLdap($email){

    $user = User::where("email",$email)->first();
      $dc_string = "dc=" . implode(",dc=",$this->dc);
      $ou_string = "ou=" . implode(",ou=",$this->ou);
      $ou_usuario = "ou=" . implode(",ou=",$this->ouUsuario);
      $cadenaConexionUsuario= 'cn='.$this->user.','.$ou_string.','.$dc_string;
      $dn = $ou_usuario.','.$dc_string;
      $filtro = "(&(objectClass=user)(sAMAccountName=$user->username))";
      $conexion=$this->PHPLdap($this->host, $this->port);
      //comentado por git
      if($conexion){
        $enlace=$this->enlazarPHPLdap($cadenaConexionUsuario, $this->password);

        if ($enlace) {
          $existeUsuarioLDAP= $this->existeLDAP($dn, $filtro);

          if($existeUsuarioLDAP){
            return true;

          }else{
            return false;
          }

        }
      }

  }

  public function PHPLdap($host, $puerto){

    if(!isset($this->ds)){
      if($this->ds = (@ldap_connect($host, $puerto))){

        return true;

      }else{
                // dd($host);
        return false;
      }
    }
  }

  public function enlazarPHPLdap($cadenaConexionUsuario, $password){

    $this->bind = @ldap_bind($this->ds, $cadenaConexionUsuario, $password);

    if($this->bind){

      return true;
    }else{

      return false;
    }
  }

  public function existeLDAP($dn, $filtro){

    $busqueda=ldap_search($this->ds, $dn, $filtro);
    $resultados = ldap_get_entries($this->ds, $busqueda);
    // var_dump($resultados);die();
    if($resultados["count"]>0){

      return true;
    }else{
      return false;
    }
  }

  public function verificarRol($dn, $filtro){

    $busqueda=ldap_search($this->ds, $dn, $filtro);
    $resultados = ldap_get_entries($this->ds, $busqueda);

    var_dump($resultados);exit;
    if($resultados["count"]>0){

      if(isset($resultados[0]['memberof'])){
        $options = Yii::app()->params['ldap'];
        $ou_rol="OU=" . implode(",OU=",$options['ouRol']);
        $directApp=$this->sacar(trim($ou_rol),'OU=' , ',');
        $tamaño=sizeof($resultados[0]['memberof']);
        $cantRol=0;

        if($tamaño>2){
          $tamaño=$tamaño-1;
          for($i=0;$i<$tamaño;$i++){

            $directAppLdap=$this->sacar(strtoupper(trim($resultados[0]['memberof'][$i])),'OU=' , ',');

            if(strtoupper($directAppLdap)==strtoupper($directApp)){

              $cantRol=$cantRol+1;
              $indice=$i;
            }
          }
          //if(($cantRol>1) || ($cantRol==0)){
          if($cantRol>1){
            return false;

          }else{

            $rol=$this->sacar(strtoupper(trim($resultados[0]['memberof'][$indice])),'CN=' , ',');
            $this->setRol($rol);
            return true;
          }
        }else{

          $directAppLdap=$this->sacar(strtoupper(trim($resultados[0]['memberof'][0])),'OU=' , ',');

          if($directAppLdap==$directApp){

            $rol=$this->sacar(strtoupper(trim($resultados[0]['memberof'][0])),'CN=' , ',');
            $this->setRol($rol);
            return true;
          }else{

            return false;
          }
        }
      }else{

        return false;
      }
    }else{
      return false;
    }
  }


  public function autenticarUsuario($dn, $filtro, $clave, $ldap){

    try{
          $busqueda=ldap_search($this->ds, $dn, $filtro);

          $resultados = ldap_get_entries($this->ds, $busqueda);

            // var_dump($resultados[0]['user'][0]);exit;

            // var_dump($resultados);exit;

            //Habiendo buscado el usuario a autenticar con "ldap_search" y obteniendo resultados en
            //un arreglo $resultados, con "ldap_get_entries", pasamos a condicionar la existencia
            //de resultados positivos.

        if($resultados["count"]>0)
        {

          //Ingreso a la condicional, verificando con el "count" que el usuario exista
          //Quiere decir que si encontró al usuario
          //Luego obtenemos el DN (Nombre Distinguido) del usuario
          $dnUsuario = trim($resultados[0]["distinguishedname"][0]);

          // dd($dnUsuario);
        $cdUsuario = trim($resultados[0]["usercedula"][0]);
        dd($cdUsuario);
          //Luego obtenemos el nombre del usuario
          $nombre_usuario=$this->sacar($dnUsuario,'CN=' , ',');
                dd($nombre_usuario);
                $directAppLdap = $this->sacar(strtoupper(trim($resultados[0]['memberof'][0])), 'CN=', ',');
dd($directAppLdap); //rol
          $rol=$this->getRol();

          $dc_string = "DC=" . implode(",DC=",$this->dc);
          $ou_rol="OU=" . implode(",OU=",$this->ouRol);
          $dnRol = $ou_rol.','.$dc_string;
          $filtroRol = "(&(objectClass=group)(sAMAccountName=$rol))";

    //die("dnRol =".$dnRol." - filtroRol =". $filtroRol);
          $descripRol = $ldap->descripRol($dnRol, $filtroRol);
    //die("descripRol =".$descripRol);

          if(isset($descripRol[0]["description"][0])){
            $descripcion = trim($descripRol[0]["description"][0]);
          }else{
            $descripcion='';
          }

          if(isset($resultados[0]["usercedula"][0])){
            $cedula = trim($resultados[0]["usercedula"][0]);
          }else{
            $cedula='';
          }

          if(isset($resultados[0]["employeeid"][0])){
            $id_sap = trim($resultados[0]["employeeid"][0]);
          }else{
            $id_sap = '';
          }

          if (isset($resultados[0]["department"][0]))
          {
            $unidad = trim($resultados[0]["department"][0]);
          }
          else
          {
            $unidad = "";
          }

          //var_dump($unidad);exit;
          //Para poder finalmente realizar el enlace final, siendo "enlace final" el login correcto.
          //Si y solo si... la clave es correcta
          //var_dump(ldap_bind($this->ds, $dnUsuario, $clave));die();

    //var_dump($descripcion);
    //var_dump($cedula);
    //var_dump($id_sap);
    //var_dump($dnUsuario);

    //die();


          if(@ldap_bind($this->ds, $dnUsuario, $clave))
          {

            //Se realiza el bind, siendo la clave correcta, y se retorna un valor VERDADERO (true)
            //Yii::app()->session['nombre']=utf8_encode($nombre_usuario);
            //Yii::app()->session['rol_ldap']=strtoupper($rol);

            \Session::put('rol_ldap_descripcion', strtoupper($descripcion));
            \Session::put('cedula', $cedula);
            \Session::put('id_sap', $id_sap);
            \Session::put('nombre', utf8_encode($nombre_usuario));



              return true;
          }
          else
          {
            return false;
          }
        }else{
          return false;
        }
      }catch (Exception $e)
      {
        // echo $e->getMessage();exit;
        return false;
      }
    }

  public function getRol(){

    //return $this->rol;
    return 1;


  }

  public function sacar($TheStr, $sLeft, $sRight){
        $pleft = strpos($TheStr, $sLeft, 0);
        if ($pleft !== false){
                $pright = strpos($TheStr, $sRight, $pleft + strlen($sLeft));
                If ($pright !== false) {
                        return (substr($TheStr, $pleft + strlen($sLeft), ($pright - ($pleft + strlen($sLeft)))));
                }
        }
        return '';
  }

  public function descripRol($dn, $filtro)
  {
    $busqueda=ldap_search($this->ds, $dn, $filtro);
    $resultados = ldap_get_entries($this->ds, $busqueda);
    return $resultados;

  }
}
