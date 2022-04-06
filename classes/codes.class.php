<?php
class codigosnum{
    public $response =[
        "status"=>"ok",
        "message"=>array(),
        "admin"=>"C356882"
    ];

    public function code_200($str = 'Correcto')
    {
        $this->response['status'] = 'Correcto';
        $this->response['message'] = array(
            'code'=>'200',
            'code_msg'=>$str
        );
        $this->response['admin'] = 'C356882';
        return $this->response;
    }

    public function code_204($str = 'Correcto - Sin Datos')
    {
        $this->response['status'] = 'Correcto';
        $this->response['message'] = array(
            'code'=>'204',
            'code_msg'=>$str
        );
        $this->response['admin'] = 'C356882';
        return $this->response;
    }

    public function code_400()
    {
        $this->response['status'] = 'Error';
        $this->response['message'] = array(
            'code'=>'400',
            'code_msg'=>'Error del Servidor'
        );
        $this->response['admin'] = 'C356882';
        return $this->response;
    }

    public function code_405()
    {
        $this->response['status'] = 'Error';
        $this->response['message'] = array(
            'code'=>'400',
            'code_msg'=>'Metodo no permitido'
        );
        $this->response['admin'] = 'C356882';
        return $this->response;
    }

    public function code_416()
    {
        $this->response['status'] = 'Error';
        $this->response['message'] = array(
            'code'=>'400',
            'code_msg'=>'Datos incorrectos validar documentacion'
        );
        $this->response['admin'] = 'C356882';
        return $this->response;
    }
}

?>