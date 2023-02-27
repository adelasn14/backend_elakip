<?php
ini_set('allow_url_fopen',1);
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':                   // URL (without file name) to a default screen
        require 'backend/home.php';
        break;
    
    // website
    case '/home':
        require 'backend/home.php';
        break;
    case '/index':
        require 'backend/index.php';
        break;
    case '/login_session':
        require 'backend/login_session.php';
        break;
    case '/logout_session':
        require 'backend/logout_session.php';
        break;
    case '/data_log':
        require 'backend/data_log.php';
        break;
    case '/login_log':
        require 'backend/login_log.php';
        break;
    case '/dok_api':
        require 'backend/dok_api.php';
        break;

    // api
    case '/login':
        require 'api/login_attempt/login.php';
        break;

    // api
    case '/user/create':
        require 'api/user/create.php';
        break;
    case '/user/read':
        require 'api/user/read.php';
        break;
    case '/user/delete':
        require 'api/user/delete.php';
        break;

        // visi
    case '/visi/read':
        require 'api/visi/read.php';
        break;
    case '/visi/read_single':
        require 'api/visi/read_single.php';
        break;
    case '/visi/create':
        require 'api/visi/create.php';
        break;
    case '/visi/update':
        require 'api/visi/update.php';
        break;
    case '/visi/delete':
        require 'api/visi/delete.php';
        break;

        //misi
    case '/misi/read':
        require 'api/misi/read.php';
        break;
    case '/misi/read_single':
        require 'api/misi/read_single.php';
        break;
    case '/misi/create':
        require 'api/misi/create.php';
        break;
    case '/misi/update':
        require 'api/misi/update.php';
        break;
    case '/misi/delete':
        require 'api/misi/delete.php';
        break;

        // kegiatan
    case '/kegiatan/read':
        require 'api/kegiatan/read.php';
        break;
    case '/kegiatan/read_single':
        require 'api/kegiatan/read_single.php';
        break;
    case '/kegiatan/create':
        require 'api/kegiatan/create.php';
        break;
    case '/kegiatan/update':
        require 'api/kegiatan/update.php';
        break;
    case '/kegiatan/delete':
        require 'api/kegiatan/delete.php';
        break;

        // tujuan
    case '/tujuan/read':
        require 'api/tujuan/read.php';
        break;
    case '/tujuan/read_single':
        require 'api/tujuan/read_single.php';
        break;
    case '/tujuan/create':
        require 'api/tujuan/create.php';
        break;
    case '/tujuan/update':
        require 'api/tujuan/update.php';
        break;
    case '/tujuan/delete':
        require 'api/tujuan/delete.php';
        break;

        // indikator_target
    case '/indikator_target/read':
        require 'api/indikator_target/read.php';
        break;
    case '/indikator_target/read_single':
        require 'api/indikator_target/read_single.php';
        break;
    case '/indikator_target/create':
        require 'api/indikator_target/create.php';
        break;
    case '/indikator_target/update':
        require 'api/indikator_target/update.php';
        break;
    case '/indikator_target/delete':
        require 'api/indikator_target/delete.php';
        break;
    default:
        http_response_code(404);
        echo @parse_url($_SERVER['REQUEST_URI'])['path'];
        exit('Not Found');
    }  
?>