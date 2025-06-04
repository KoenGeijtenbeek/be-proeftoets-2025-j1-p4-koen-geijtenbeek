<?php

class Horloges extends BaseController
{
    private $horlogesModel;

    public function __construct()
    {
         $this->horlogesModel = $this->model('HorlogesModel');
    }

    public function index($message = 'none')
    {
       /**
        * Het $data-array geeft informatie mee aan de view-pagina
        */
       $data = [
            'title' => 'Top 5 mooiste horloges',
            'message' => $message
       ];
       
       /**
        * Hier halen we alle smartphones op uit de database
        */
       $data['horloges'] = $this->horlogesModel->getAllHorloges();
       
       

         /**
          * Met de view-method uit de BaseController-class wordt de view
          * aangeroepen met de informatie uit het $data-array
          */
       $this->view('horloges/index', $data); 
    }

    public function delete($Id)
    {
          $result = $this->horlogesModel->delete($Id);
          
          header('Refresh:3 ; url=' . URLROOT . '/horloges/index');

          $this->index('flex');
    }

    public function create()
    {
          $data = [
               'title' => 'Nieuwe horloge toevoegen',
               'message' => 'none'
          ];

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
               if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['prijs'])) {
                    echo '<div class="alert alert-danger text-center" role="alert"><h4>Vul alle velden in</h4></div>';
                    header('Refresh: 3; URL=' . URLROOT . '/horloges/create');
                    exit;
               }

               $data['message'] = 'flex';

               $this->horlogesModel->create($_POST);
               
               header('Refresh: 3; URL=' . URLROOT . '/horloges/index');
          }          

          $this->view('horloges/create', $data);
    }
}