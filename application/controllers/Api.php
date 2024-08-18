<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function cekGame()
    {
        $data = $this->input->input_stream();
        $ip = $this->input->ip_address();
        $api = !empty($data['api_key']) ? $data['api_key'] : '';
        $user_id = !empty($data['user_id']) ? $data['user_id'] : '';
        $zone_id = !empty($data['zone_id']) ? $data['zone_id'] : ''; 
        $cek = $this->db->get_where('api_key',['api_key' => $api])->row();
        $nama_game = !empty($data['game']) ? $data['game'] : '';

        

        

        if($cek !== NULL){
            
            $cek_status = $this->db->get_where('users',['id_user' => $cek->id_user])->row();
    
            if($cek_status->status == 0){
    
                set_status_header(400);
    
                $res = [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'INACTIVE USER!'
                ];
    
                echo json_encode($res); 
    
                exit();
    
            }

         if($nama_game == 'Mobile Legends' || $nama_game == 'Lords Mobile' || $nama_game == 'Call Of Duty' || $nama_game == 'Free Fire' || $nama_game == 'AOV' || $nama_game == 'Honkai Impact' || $nama_game == 'Dragon Raja' || $nama_game == 'Point Blank' ||$nama_game == 'Ragnarok M' || $nama_game == 'Mobile Legends Adventure' || $nama_game == 'Top Eleven' || $nama_game == 'Marvel Super War' || $nama_game == '8 Ball Pool' || $nama_game == 'Dragon City' || $nama_game == 'Tom Jerry Chase' || $nama_game == 'Apex Legends' || $nama_game == 'Higgs Domino' || $nama_game == 'Valorant' || $nama_game == 'Genshin Impact'){

        
            if(!empty($cek->whitelist_ip)){

                $list_ip = explode(':',$cek->whitelist_ip);

                $search = array_search($ip,$list_ip);

                // if($search === false){

                //     set_status_header(400);

                //     $res = [
                //         'code' => 400,
                //         'status' => 'error',
                //         'message' => "YOUR IP ADDRESS $ip IS NOT ALLOWED TO ACCESS"
                //     ];

                //     echo json_encode($res);

                // }else{

                    switch($nama_game){
                        case 'Mobile Legends':
                            sleep(3);
                            $game = json_decode(cekML($user_id,$zone_id));
                        break;
                        case  'Lords Mobile':
                            sleep(3);
                            $game = json_decode(cekLM($user_id));
                        break;
                        case  'Call Of Duty':
                            sleep(3);
                            $game = json_decode(cekCODM($user_id));
                        break;
                        case  'Free Fire':
                            sleep(3);
                            $game = json_decode(cekFF($user_id));
                        break;
                        case  'AOV':
                            sleep(3);
                            $game = json_decode(cekAOV($user_id));
                        break;
                        case  'Honkai Impact':
                            sleep(3);
                            $game = json_decode(cekHI3($user_id));
                        break;
                        case  'Dragon Raja':
                            sleep(3);
                            $game = json_decode(cekDR($user_id));
                        break;
                        case  'Point Blank':
                            sleep(3);
                            $game = json_decode(cekPB($user_id));
                        break;
                        case  'Ragnarok M':
                            sleep(3);
                            $game = json_decode(cekROM($user_id,$zone_id));
                        break;
                        case  'Mobile Legends Adventure':
                            sleep(3);
                            $game = json_decode(cekMLA($user_id,$zone_id));
                        break;
                        case  'Top Eleven':
                            sleep(3);
                            $game = json_decode(cekTE($user_id));
                        break;
                        case  'Marvel Super War':
                            sleep(3);
                            $game = json_decode(cekMSW($user_id));
                        break;
                        case  '8 Ball Pool':
                            sleep(3);
                            $game = json_decode(cek8BP($user_id));
                        break;
                        case  'Dragon City':
                            sleep(3);
                            $game = json_decode(cekDC($user_id));
                        break;
                        case  'Tom Jerry Chase':
                            sleep(3);
                            $game = json_decode(cekTJ($user_id));
                        break;
                        case  'Apex Legends':
                            sleep(3);
                            $game = json_decode(cekALM($user_id));
                        break;
                        case  'Higgs Domino':
                            sleep(3);
                            $game = json_decode(cekHD($user_id));
                        break;
                        case  'Valorant':
                            sleep(3);
                            $game = json_decode(cekValorant($user_id));
                        break;
                        case  'Genshin Impact':
                            sleep(3);
                            $game = json_decode(cekGI($user_id,$zone_id));
                        break;
                    }

                    if($game->code !== 200){

                        $res = [
                            'code' => 400,
                            'status' => 'error',
                            'message' => $game->msg
                        ];
    
                        echo json_encode($res);

                        exit();

                    }

                    set_status_header(200);

                    $res = [
                        'code' => 200,
                        'status' => 'success',
                        'result' => [

                            'game'     => $nama_game,
                            'user_id'  => $user_id,
                            'zone_id'  => $zone_id,
                            'username' => !empty($game->username) ? $game->username : ''

                        ]
                    ];

                    echo json_encode($res);


                // }

               
                
            }else{


                switch($nama_game){
                    case 'Mobile Legends':
                        sleep(3);
                        $game = json_decode(cekML($user_id,$zone_id));
                    break;
                    case  'Lords Mobile':
                        sleep(3);
                        $game = json_decode(cekLM($user_id));
                    break;
                    case  'Call Of Duty':
                        sleep(3);
                        $game = json_decode(cekCODM($user_id));
                    break;
                    case  'Free Fire':
                        sleep(3);
                        $game = json_decode(cekFF($user_id));
                    break;
                    case  'AOV':
                        sleep(3);
                        $game = json_decode(cekAOV($user_id));
                    break;
                    case  'Honkai Impact':
                        sleep(3);
                        $game = json_decode(cekHI3($user_id));
                    break;
                    case  'Dragon Raja':
                        sleep(3);
                        $game = json_decode(cekDR($user_id));
                    break;
                    case  'Point Blank':
                        sleep(3);
                        $game = json_decode(cekPB($user_id));
                    break;
                    case  'Ragnarok M':
                        sleep(3);
                        $game = json_decode(cekROM($user_id,$zone_id));
                    break;
                    case  'Mobile Legends Adventure':
                        sleep(3);
                        $game = json_decode(cekMLA($user_id,$zone_id));
                    break;
                    case  'Top Eleven':
                        sleep(3);
                        $game = json_decode(cekTE($user_id));
                    break;
                    case  'Marvel Super War':
                        sleep(3);
                        $game = json_decode(cekMSW($user_id));
                    break;
                    case  '8 Ball Pool':
                        sleep(3);
                        $game = json_decode(cek8BP($user_id));
                    break;
                    case  'Dragon City':
                        sleep(3);
                        $game = json_decode(cekDC($user_id));
                    break;
                    case  'Tom Jerry Chase':
                        sleep(3);
                        $game = json_decode(cekTJ($user_id));
                    break;
                    case  'Apex Legends':
                        sleep(3);
                        $game = json_decode(cekALM($user_id));
                    break;
                    case  'Higgs Domino':
                        sleep(3);
                        $game = json_decode(cekHD($user_id));
                    break;
                    case  'Valorant':
                        sleep(3);
                        $game = json_decode(cekValorant($user_id));
                    break;
                    case  'Genshin Impact':
                        sleep(3);
                        $game = json_decode(cekGI($user_id,$zone_id));
                    break;
                }


                if($game->code !== 200){

                    $res = [
                        'code' => 400,
                        'status' => 'error',
                        'message' => $game->msg
                    ];

                    echo json_encode($res);

                    exit();

                }

                set_status_header(200);

                $res = [
                    'code' => 200,
                    'status' => 'success',
                    'result' => [

                        'game'     => $nama_game,
                        'user_id'  => $user_id,
                        'zone_id'  => $zone_id,
                        'username' => !empty($game->username) ? $game->username : ''

                    ]
                ];

                echo json_encode($res);



            }

        }else{

            set_status_header(400);

            $res = [
                'code' => 400,
                'status' => 'error',
                'message' => 'GAME NOT FOUND!'
            ];

            echo json_encode($res);

        }

            


        }else{

            set_status_header(400);

            $res = [
                'code' => 400,
                'status' => 'error',
                'message' => 'API KEY NOT FOUND!'
            ];

            echo json_encode($res); 

        }

    }
	
}
