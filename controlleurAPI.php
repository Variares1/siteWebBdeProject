<?php

class controllerAPI
{

  function_construct(){
    $this->API();
  }

  function GET($user){
    private $model = null;

        $get_data = callAPI('GET', 'https://api.example.com/get_url/'.$user['User']['customer_id'], false);
        $response = json_decode($get_data, true);
        $errors = $response['response']['errors'];
        $data = $response['response']['data'][0];


                
function PUT($lease, $data_array){
       // $data_array =  array(
       //     "amount" => (string)($lease['amount'] / $tenant_count)
       //  );

        $update_plan = callAPI('PUT', 'https://api.example.com/put_url/'.$lease['plan_id'], json_encode($data_array));
        $response = json_decode($update_plan, true);
        $errors = $response['response']['errors'];
        $data = $response['response']['data'][0];

}

  function POST($user, $data_array){

      // $data_array =  array(
      //               "customer"        => $user['User']['customer_id'],
      //               "payment"         => array(
      //               "number"         => $this->request->data['account'],
      //               "routing"        => $this->request->data['routing'],
      //               "method"         => $this->request->data['method']
      //         ),
      //   );

                $make_call = callAPI('POST', 'https://api.example.com/post_url/', json_encode($data_array));
                $response = json_decode($make_call, true);
                $errors   = $response['response']['errors'];
                $data     = $response['response']['data'][0];

  }

   function DELETE($id,$url){
      callAPI('DELETE', $url . $id, false);
    }
new controllerAPI();