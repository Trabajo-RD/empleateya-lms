<?php
function getStateIfExists($id)
{
    $stateContent = file_get_contents('state.json');

    $state = json_decode($stateContent, true);

    foreach ($state as $key => $value) {
        if ($value['id'] === $id) {
            return array('key' => $key, 'value' => $value, 'state' => $state);
        }
    }

    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = json_decode(file_get_contents('php://input'));

    $id = $json->id;

    // $keys = json_decode($_POST['keys']);

    // if (count($keys) === 0)
    //     return;

    // echo print_r($json);

    if (isset($id)) {
        $response = getStateIfExists($id);


        if ($response !== null) {
            $state = $response['state'];
            $value = $response['value'];

            // echo print_r($state);
            // echo print_r($value);

            $updated = false;

            foreach ($json as $key => $param) {
                //  echo print_r($value[$key]);

                if ($key !== 'update') {
                    $value[$key] = $param;

                    if(!$updated) $updated = true;
                }
            }

            if ($updated) {
                $state[$response['key']] = $value;

                file_put_contents('state.json', json_encode($state));

                echo $id . '=Updated!!!';
            }
        } else {
            $data = json_decode(file_get_contents('state.json'));

            array_push($data, $json);

            file_put_contents('state.json', json_encode($data));

            echo $id . '=Created!!!';
        }
    }
} else {

    $id = $_GET['id'];

    $response = array();


    if (isset($id)) {
        $resp = getStateIfExists($id);

        if ($resp !== null)
            $response = $resp['value'];
    }

    echo json_encode($response);
}
