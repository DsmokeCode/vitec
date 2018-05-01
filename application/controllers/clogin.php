<?php
class Clogin extends ci_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('mlogin');
    }

    public function index()
    {
        $data['mensaje']= "";
        $this->load->view('login/vlogin', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function ingresar()
    {
        
        $usu  = $this->input->post('txtusuario');
        $pass = sha1($this->input->post('txtpass'));

        $res  = $this->mlogin->ingresar($usu, $pass);

        if ($res == 1) {
            $this->load->view('layout/header');
            $this->load->view('layout/menu');
            $this->load->view('vprincipal');
            $this->load->view('layout/footer');
        } else {
            $data['mensaje']= "Usuario o Contraseña Erronea";
            $this->load->view('login/vlogin', $data);
        }
    }

    public function index1()
    {
        $data['mensaj']= "";
        $this->load->view('login/vrecontraseña', $data);
    }
    public function ecorreo()
    {
        $correo  = $this->input->post('txtcorreo');
//        echo $correo ;

        $res  = $this->mlogin->rcuenta($correo);
        if ($res == 1) {
            $config = array(
                          'protocol' => 'smtp',
                          'smtp_host' => 'ssl://smtp.googlemail.com',
                          'smtp_port' => 465,
                          'smtp_user' => 'davidcasachagua11@gmail.com', // have my email here
                          'smtp_pass' => 'dcasachagua21', // and my password here
                          'mailtype'  => 'html',
                            'charset'   => 'iso-8859-1',
                            'wordwrap' => true
                        );

            $this->load->library('email', $config);

            $this->email->from('dcasachaguaromero@gmail.com', 'admin');
            $this->email->to('alcarraz.pablo.angel@gmail.com');//my mail here

            $this->email->subject('testing');
            $this->email->message("holaaaaaaa");

            $this->email->send(); //sending mail
            $this->email->print_debugger();

            echo "Envio de Correo";
        } else {
            $dat['mensaj']= "EL CORREO NO SE ENCUENTRA REGISTRADO EN EL SISTEMA";
            $this->load->view('login/vrecontraseña', $dat);
        }
    }

    public function index2()
    {
        $data['mensaj']= "";
        $this->load->view('login/vgusuario', $data);
    }

    public function nusuario()
    {
        $dni = $this->input->post('txtdni');

        $res = $this->mlogin->nusuario($dni);

        if ($res == 1) {
          echo 1;
        }elseif ($res == 0) {
          echo 0;
        }else {
          echo json_encode($res);
        }
    }


    public function modalusuario()
    {
      $param['codper'] = $this->input->post('umdlpersona');
      $param['telper'] = $this->input->post('modaltelefono');
      $param['email'] = $this->input->post('modalemail');
      $param['fnacper'] = $this->input->post('modalfecnacimiento');
      $param['sexo'] = $this->input->post('mdlcbxSexo');

      $codpers = $this->input->post('umdlpersona');

      $j = $this->mlogin->modalusuario($param,$codpers);
      echo json_encode($j);
    }
}
