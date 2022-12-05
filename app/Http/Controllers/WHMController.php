<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WHMController extends Controller
{
    private string $user = 'root';
    private string $host = '82.166.23.74';
    private string $api_version = '1';

    public function updateSiteList()
    {
        $response = Http::withHeaders([
            'Authorization' => 'whm ' . $this->user . ':' . env('WHM_TOKEN')
        ])->withOptions(["verify" => false])->get('https://'.$this->host.':2087/json-api/execute/WordPressSite/retrieve?api.version=' . $this->api_version);
        $response_data = json_decode($response->body());


        if ($response->ok() && $response_data->metadata->result) {
            foreach ($response_data->data->acct as $_site) {
                $site = Site::updateOrCreate([
                    'domain' => $_site->domain
                ], [
                    'is_suspended' => $_site->suspended,
                    'start_date' => gmdate('Y-m-d H:i:s', $_site->unix_startdate),
                    'disk_limit' => $_site->disklimit,
                    'disk_used' => $_site->diskused,
                    'ip' => $_site->ip
                ]);
            }
        }

    }

    public function WPToolkitTest(){

        $ip = '82.166.23.74';
        $user = 'root';
        $pass = '0ZTsSTd3daDNPz!';

        $connection = ssh2_connect($ip);
        ssh2_auth_password($connection,$user,$pass);
        $shell = ssh2_shell($connection,"bash");

        var_dump($shell);


    }
}
