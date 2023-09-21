<?php

/**
 * Handles plugin ajax functionalities.
 *
 * @link       https://boomdevs.com
 * @since      1.0.0
 *
 * @package    Wp_Bnav
 * @subpackage Wp_Bnav/includes
 */

/**
 * Registers ajax endpoints.
 *
 * @since      1.0.0
 * @package    Wp_Bnav
 * @subpackage Wp_Bnav/includes
 * @author     BOOM DEVS <contact@boomdevs.com>
 */
class Wp_Bnav_Ajax {
    /**
     * Register ajax hook for setting a premade skin.
     *
     * @since 1.0.0
     */
    public function set_premade_skin() {

        check_ajax_referer( 'set_premade_skin', 'nonce' );

        // Available skins.
        $default_available_skins_data['default_skin'] = unserialize('a:105:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:7:"#1e1e1e";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:1:"0";s:16:"main-wrap-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"1";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:1:"0";s:21:"main-wrap-shadow-blur";s:1:"5";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:18:"rgba(0, 0, 0, 0.1)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:10:"flex-start";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:19:"rgba(45,45,59,0.95)";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.5";s:17:"main-menu-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:1:"5";s:6:"bottom";s:2:"35";s:4:"left";s:1:"5";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"18";s:6:"bottom";s:0:"";s:4:"left";s:2:"18";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:0:"";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:3:"top";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:2:"10";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#818799";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:4:"show";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#FFFFFF";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:12:"default_skin";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:3:"top";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";i:0;s:4:"righ";i:0;s:5:"bottm";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#818797";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#ffffff";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#ffffff";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#818799";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:22:"rgba(40, 40, 49, 0.85)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.85)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818799";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818799";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:4:"left";s:17:"sub-nav-alignment";s:6:"center";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:22:"rgba(40, 40, 49, 0.95)";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#3a3b44";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"13";s:6:"bottom";s:2:"12";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"1";s:6:"bottom";s:1:"0";s:4:"left";s:1:"1";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"3";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(255,255,255,0)";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"3";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#d5ee9b";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.85)";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:7:"#fcfcfc";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#3a3b44";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"18";s:5:"right";s:2:"13";s:6:"bottom";s:2:"18";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";i:0;s:5:"right";i:0;s:6:"bottom";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"2";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"2";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#d5ee9b";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:3:"7.5";}');
        $default_available_skins_data['skin_one'] = unserialize('a:107:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:22:"rgba(255,255,255,0.95)";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:3:"7.5";s:16:"main-wrap-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"1";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:2:"10";s:21:"main-wrap-shadow-blur";s:2:"34";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:16:"rgba(0,0,0,0.12)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:10:"flex-start";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:22:"rgba(255,255,255,0.95)";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.5";s:17:"main-menu-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:1:"5";s:6:"bottom";s:2:"35";s:4:"left";s:1:"5";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"18";s:6:"bottom";s:0:"";s:4:"left";s:2:"18";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:0:"";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:3:"top";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:2:"10";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#99a7bb";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:4:"show";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#0a1c36";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:8:"skin_one";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:3:"top";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";i:0;s:4:"righ";i:0;s:5:"bottm";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#939fb0";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#0a1c36";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#0a1c36";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#99a7bb";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591a1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591a1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:4:"left";s:17:"sub-nav-alignment";s:6:"center";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:16:"rgba(40,40,49,0)";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#f1f1f1";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"13";s:6:"bottom";s:2:"12";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"1";s:6:"bottom";s:1:"0";s:4:"left";s:1:"1";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"3";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(255,255,255,0)";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"3";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#608ee9";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:22:"rgba(240,245,255,0.85)";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:19:"rgba(252,252,252,0)";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#f1f1f1";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"18";s:5:"right";s:2:"13";s:6:"bottom";s:2:"18";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";i:0;s:5:"right";i:0;s:6:"bottom";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"2";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"2";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#608ee9";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:3:"7.5";s:26:"child-menu-background-type";s:10:"background";s:21:"child-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}}');
        $skins = apply_filters( 'wp_bnav_get_skins_data', $default_available_skins_data );

        if (!$skins) {
            $skins = $default_available_skins_data;
        }

        // Selected skin.
        $skin = sanitize_text_field( $_POST['skin'] );


        if (array_key_exists( $skin, $skins)) {
            update_option( 'wp-bnav', $skins[sanitize_text_field($_POST['skin'])] );

            $return = array(
                'status'  => 'success',
            );
        } else {
            $return = array(
                'status'  => 'failed',
                'message' => __( 'Sorry the requested skin is not available to import.', 'wp-bnav' ),
            );
        }

        wp_send_json($return);

        exit;
    }
}
