<?php
namespace Classes;

class ClassLayoutLogin{

    public static function setHeadRestrito()
    {
        $session=new ClassSessions();
        $session->verifyInsideSession();
    }

    #Setar as tags do head
    public static function setHead($title , $description , $author='Weverson')
    {
        $html="<!doctype html>\n";
        $html.="<html lang='pt-br'>\n";
        $html.="<head>\n";
        $html.="  <meta charset='UTF-8'>\n";
        $html.="  <meta name='viewport' content='width=device-width, initial-scale=1'>\n";
        $html.="  <meta name='author' content='$author'>\n";
        $html.="  <meta name='format-detection' content='telephone=no'>\n";
        $html.="  <meta name='description' content='$description'>\n";
        $html.="  <title>$title</title>\n";
        #STYLESHEET
        $html.=" <link rel='stylesheet' href='".DIRPAGE."lib/css/style.css'> \n";
        $html.="<link rel='icon' href='lib2/img/favicon.png'>\n";
        $html.="<link rel='stylesheet' href='lib2/css/bootstrap.min.css'>\n";
        $html.="<link rel='stylesheet' href='lib2/css/animate.css'>\n";
        $html.="<link rel='stylesheet' href='lib2/css/owl.carousel.min.css'>\n";
        $html.="<link rel='stylesheet' href='lib2/css/themify-icons.css'>\n";
        $html.="<link rel='stylesheet' href='lib2/css/flaticon.css'>\n";
        $html.="<link rel='stylesheet' href='lib2/css/magnific-popup.css'>\n";
        $html.="<link rel='stylesheet' href='lib2/css/nice-select.css'>\n";
        $html.="<link rel='stylesheet' href='lib2/css/slick.css'>\n";
        $html.="<link rel='stylesheet' href='lib2/css/style.css'>\n";
        $html.="<div id='divCarregando' class='progresso'>\n";
        $html.="</div>\n";
        //$html.="<div id='blanket'></div>\n";
        //$html.="<div id='aguarde'></div>\n";
        $html.="<header class='main_menu home_menu'>\n";
        $html.="<div class='container'>\n";
        $html.="<div class='row align-items-center'>\n";
        $html.="<div class='col-lg-12'>\n";
        $html.="<nav class='navbar navbar-expand-lg navbar-light'>\n";
        $html.="<a class='navbar-brand' href='index'> <img src='lib2/img/favicon.png' alt='logo' width='60px'> </a>\n";
        $html.="<b style='font-size: 40px'>Orthoface</b>\n";
        $html.="<button class='navbar-toggler' type='button' data-toggle='collapse'\n";
        $html.="data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'\n";
        $html.="aria-expanded='false' aria-label='Toggle navigation'>\n";
        $html.="<span class='navbar-toggler-icon'></span>\n";
        $html.="</button>\n";
        
        $html.="<div class='collapse navbar-collapse main-menu-item justify-content-center'\n";
        $html.="id='navbarSupportedContent'>\n";
        $html.="<ul class='navbar-nav align-items-center'>\n";
        $html.="<li class='nav-item active'>\n";
        $html.="<a class='nav-link' href='index'>Inicio</a>\n";
        $html.="</li>\n";
                               
       
                               
        $html.="<li class='nav-item'>\n";
        $html.="<a class='nav-link' href='".DIRPAGE."servicos'>Serviços</a>\n";
        $html.="</li>\n";

        $html.="<li class='nav-item'>\n";
        $html.="<a class='nav-link' href='".DIRPAGE."clinica'>Clínica</a>\n";
        $html.="</li>\n";
                                

       
        $html.="<li class='nav-item'>\n";
        $html.="<a class='nav-link' href='".DIRPAGE."sobre'>Sobre</a>\n";
        $html.="</li>\n";
        $html.="</ul>\n";
        $html.="</div>\n";
        $html.="</div>\n";
                        
        $html.="</nav>\n";
        $html.="</div>\n";
        $html.="</div>\n";
        $html.="</div>\n";
        $html.="</header>\n";
        
        
        echo $html;
    }

    #Setar as tags do footer


    
}