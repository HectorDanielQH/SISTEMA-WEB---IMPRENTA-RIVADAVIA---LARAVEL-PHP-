<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Imprenta Rivadavia</title>
    <style>
        @charset "utf-8";

        @import url("fontawesome-free/css/fontawesome-all.min.css");
        @import url("framework.css");

        /* Rows
        --------------------------------------------------------------------------------------------------------------- */
        .row0, .row0 a{}
        .row1, .row1 a{}
        .row2, .row2 a{}
        .row3, .row3 a{}
        .row4, .row4 a{}
        .row5, .row5 a{}


        /* Top Bar
        --------------------------------------------------------------------------------------------------------------- */
        #topbar{padding:20px 0; font-size:.8rem; text-transform:uppercase;}

        #topbar ul li{display:inline-block; margin-right:15px;}
        #topbar ul li:last-child{margin-right:0; padding-right:0; border-right:none;}
        #topbar i{line-height:normal;}
        #topbar > div:nth-of-type(2) i{font-size:1rem;}

        /* Search Form */
        #topbar #searchform{position:relative; line-height:1; z-index:9999;}
        #topbar #searchform::after{display:block; height:18px; line-height:18px; padding:0; font-family:"Font Awesome\ 5 Free"; font-weight:900; font-size:1rem; content:"\f002"/* fa-search */;}
        #topbar #searchform:hover::after, #topbar #searchform button{cursor:pointer;}
        #topbar #searchform > div{position:absolute; top:18px; right:0; width:280px; visibility:hidden; opacity:0/* Required for transition effect */;}
        #topbar #searchform:hover > div{visibility:visible; opacity:1;}
        #topbar #searchform form{display:block; position:relative;}
        #topbar #searchform form *{border:none;}
        #topbar #searchform input{display:block; width:100%; height:36px; padding:8px 40px 8px 10px; font-size:1rem;}
        #topbar #searchform ::placeholder{text-transform:capitalize;}
        #topbar #searchform button{display:block; position:absolute; top:3px; right:2px; height:30px; font-size:16px; line-height:1;}


        /* Header
        --------------------------------------------------------------------------------------------------------------- */
        #header{}

        #header #logo{margin:22px 0 0 0;}


        /* Page Intro
        --------------------------------------------------------------------------------------------------------------- */
        #pageintro{padding:200px 0 270px;}/* 270px => 70px for #introblocks negative margin */

        #pageintro article{display:block; max-width:55%;}
        #pageintro article p{line-height:2.5rem; font-size:1.6rem;}
        #pageintro article p:first-of-type{margin:0 0 20px 0; padding:0; text-transform:uppercase; font-size:1.2rem; line-height:1;}
        #pageintro .heading{margin-bottom:40px; font-size:4rem;}
        #pageintro footer{margin-top:50px;}


        /* Content Area
        --------------------------------------------------------------------------------------------------------------- */
        .container{padding:80px 0;}

        /* Content */
        .container .content{}

        .sectiontitle{display:block; max-width:55%; margin:0 auto 80px; text-align:center;}
        .sectiontitle *{margin:0;}

        .elements{}
        .elements-three li{margin-bottom:30px;}
        .elements-three li:nth-last-child(-n+3){margin-bottom:0;}/* Removes bottom margin from the last line of items - margin is restored in the media queries when items stack */
        .elements-three li:nth-child(3n+1){margin-left:0; clear:left;}/* Removes the need to add class="first" */
        .elements article{display:block; position:relative; padding:30px 15px; border:1px solid;}
        .elements article *{margin:0; padding:0; line-height:1;}
        .elements article i{width:60px; height:60px; line-height:60px; font-size:2rem; text-align:center;}
        .elements article .heading{}
        .elements article p{line-height:1.4rem;}
        .elements article footer{}

        /* Introblocks */
        #introblocks{display:block; position:relative; margin-top:-150px; z-index:1;}/* 150px => 70px + container padding */
        #introblocks .elements article{min-height:122px;/* padding + border + icon */ padding-left:90px;}
        #introblocks .elements article .heading{margin-bottom:15px;}
        #introblocks .elements article footer{position:absolute; top:35px; left:15px;}

        /* Services */
        #services{}
        #services .elements article{padding:25px;}
        #services .elements article > div{display:block; position:relative; min-height:60px; margin:0 0 30px 0; padding:12px 0 0 75px;}
        #services .elements article > div footer{position:absolute; top:0; left:0;}
        #services .elements article > p:first-of-type{line-height:1.6rem;}
        #services .elements article > p:last-of-type{margin-top:30px; padding-top:20px; text-transform:uppercase; text-align:center; font-weight:700; border-top:1px solid;}

        /* Shout */
        .shout{}
        .shout figure{display:block; max-width:546px;/* same width as the image - contains the caption */}
        .shout figure img{}
        .shout figure figcaption{display:block; position:relative;}
        .shout figure figcaption a{display:block; position:relative; padding:15px; border:solid; border-width:0 1px 1px 1px;}
        .shout figure figcaption a::after{position:absolute; top:12px; right:15px; width:30px; height:30px; line-height:30px; font-family:"Font Awesome\ 5 Free"; font-weight:900; content:"\f105";/* fa-angle-right */ text-align:center;}

        /* Easy Pie Charts */
        .pr-charts{}
        .pr-charts .pr-chart-ctrl{display:block; float:left; width:25%; min-height:200px;}
        .pr-charts .pr-chart-ctrl .pr-chart{display:block; position:relative; width:100%; margin:0 0 50px 0; text-align:center;}
        .pr-charts .pr-chart-ctrl .pr-chart canvas{display:block; margin:0 auto; padding:0; vertical-align:top;}
        .pr-charts .pr-chart-ctrl .pr-chart i{position:absolute; top:0; left:0; width:100%; height:200px; line-height:200px; font-size:18px; font-style:normal;}/* Must have same height & line height as set in the javascript size element to vertical align centre */
        .pr-charts .pr-chart-ctrl p{margin:0; padding:0; text-transform:uppercase;}

        /* Comments */
        #comments ul{margin:0 0 40px 0; padding:0; list-style:none;}
        #comments li{margin:0 0 10px 0; padding:15px;}
        #comments .avatar{float:right; margin:0 0 10px 10px; padding:3px; border:1px solid;}
        #comments address{font-weight:bold;}
        #comments time{font-size:smaller;}
        #comments .comcont{display:block; margin:0; padding:0;}
        #comments .comcont p{margin:10px 5px 10px 0; padding:0;}

        #comments form{display:block; width:100%;}
        #comments input, #comments textarea{width:100%; padding:10px; border:1px solid;}
        #comments textarea{overflow:auto;}
        #comments div{margin-bottom:15px;}
        #comments input[type="submit"], #comments input[type="reset"]{display:inline-block; width:auto; min-width:150px; margin:0; padding:8px 5px; cursor:pointer;}

        /* Sidebar */
        .container .sidebar{}

        .sidebar .sdb_holder{margin-bottom:50px;}
        .sidebar .sdb_holder:last-child{margin-bottom:0;}


        /* CTA - Click to action
        --------------------------------------------------------------------------------------------------------------- */
        #cta{padding:80px 0; text-align:center;}

        #cta p, #cta .heading, #cta footer{margin:0; padding:0;}
        #cta p:first-of-type{text-transform:uppercase;}
        #cta .heading{margin-bottom:50px; font-size:3rem;}
        #cta .heading span{font-size:4rem;}
        #cta footer{}
        #cta footer .btn{padding:14px 40px;}


        /* Footer
        --------------------------------------------------------------------------------------------------------------- */
        #footer{padding:80px 0;}

        #footer .heading{margin-bottom:50px; font-size:1.2rem;}
        #footer .logoname{margin-bottom:50px;}
        #footer p + .faico{margin-top:30px;}

        #footer input, #footer button{border:1px solid;}
        #footer input{display:block; width:100%; padding:12px 15px;}
        #footer button{padding:10px 15px 12px; font-size:1rem;}

        #footer .linklist li{display:block; margin-bottom:15px; padding:0 0 15px 0; border-bottom:1px solid;}
        #footer .linklist li:last-child{margin:0; padding:0; border:none;}
        #footer .linklist li::before, #footer .linklist li::after{display:table; content:"";}
        #footer .linklist li, #footer .linklist li::after{clear:both;}

        #footer .latestimg{}
        #footer .latestimg > li{display:inline-block; float:left; width:30%; margin:0 0 5% 5%;}
        #footer .latestimg > li:nth-last-child(-n+3){margin-bottom:0;}/* Removes bottom margin from the last three items - margin is restored in the media queries when items stack */
        #footer .latestimg > li:nth-child(3n+1){margin-left:0; clear:left;}/* Removes the need to add class="first" */
        #footer .latestimg > li img{width:100%;}/* Force the image to resize to take the full space - may have to be changed for tablets, depends on personal preference */
        #footer .latestimg > li a.imgover{display:block;}

        #ctdetails{display:block; position:relative; margin-bottom:80px; padding-bottom:80px; border-bottom:5px solid;}
        #ctdetails::before, #ctdetails::after{display:block; position:absolute; bottom:-5px; left:50%; width:100px; height:5px; margin-left:-50px; content:""; transform:rotate(25deg);}
        #ctdetails::after{transform:rotate(-25deg);}
        #ctdetails > ul{}
        #ctdetails > ul li{}
        #ctdetails > ul li > div{display:block; position:relative; min-height:75px; padding:15px 15px 15px 80px; line-height:1;}
        #ctdetails > ul li:last-child{margin-bottom:0;}/* Used when elements stack in small viewports */
        #ctdetails > ul li i{position:absolute; top:15px; left:15px; width:45px; height:45px; line-height:45px; font-size:16px; text-align:center;}
        #ctdetails > ul li span{display:block; padding:4px 0 0 0;}
        #ctdetails > ul li strong{display:block; margin:0 0 8px 0; text-transform:capitalize;}


        /* Copyright
        --------------------------------------------------------------------------------------------------------------- */
        #copyright{padding:20px 0;}
        #copyright *{margin:0; padding:0;}


        /* Add roundness to certain items
        Settings are all different due to the optical similarity needed for different sized elements
        Delete this section if roundness is not wanted / required
        --------------------------------------------------------------------------------------------------------------- */
        .btn{border-radius:14px;}

        #topbar #searchform input{border-radius:8px;}

        .elements article{border-radius:22px;}
        .elements article i{border-radius:12px;}

        .shout figure img{border-radius:22px 22px 0 0;}
        .shout figure figcaption a{border-radius:0 0 22px 22px;}
        .shout figure figcaption a::after{border-radius:8px;}

        #footer input, #footer button{border-radius:12px;}
        #ctdetails > ul li{border-radius:16px;}
        #ctdetails > ul li i{border-radius:12px;}

        --------------------------------------------------------------------------------------------------------------- */
        *, *::before, *::after{transition:all .3s ease-in-out;}
        #mainav form *{transition:none !important;}


        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */


        /* Navigation
        --------------------------------------------------------------------------------------------------------------- */
        nav ul, nav ol{margin:0; padding:0; list-style:none;}

        #mainav, #breadcrumb, .sidebar nav{line-height:normal;}
        #mainav .drop::after, #mainav li li .drop::after, #breadcrumb li a::after, .sidebar nav a::after{position:absolute; font-family:"Font Awesome\ 5 Free"; font-weight:900; font-size:10px; line-height:10px;}

        /* Top Navigation */
        #mainav{}
        #mainav ul{text-transform:uppercase;}
        #mainav ul ul{position:absolute; width:180px; text-transform:none; z-index:9999;}
        #mainav ul ul ul{left:180px; top:0;}
        #mainav li{display:inline-block; position:relative; margin:0 15px 0 0; padding:0;}
        #mainav li:last-child{margin-right:0;}
        #mainav li li{width:100%; margin:0;}
        #mainav li a{display:block; padding:30px 0;}
        #mainav li li a{border:solid; border-width:0 0 1px 0;}
        #mainav .drop{padding-left:15px;}
        #mainav li li a, #mainav li li .drop{display:block; margin:0; padding:10px 15px;}
        #mainav .drop::after, #mainav li li .drop::after{content:"\f0d7";}
        #mainav .drop::after{top:35px; left:5px;}
        #mainav li li .drop::after{top:15px; left:5px;}
        #mainav ul ul{visibility:hidden; opacity:0;}
        #mainav ul li:hover > ul{visibility:visible; opacity:1;}

        #mainav form{display:none; width:100%; margin:0; padding:0;}
        #mainav form select, #mainav form select option{display:block; cursor:pointer; outline:none;}
        #mainav form select{width:100%; padding:5px; border:1px solid;}
        #mainav form select option{margin:5px; padding:0; border:none;}

        /* Breadcrumb */
        #breadcrumb{padding:150px 0 30px;}
        #breadcrumb ul{margin:0; padding:0; list-style:none; text-transform:uppercase;}
        #breadcrumb li{display:inline-block; margin:0 6px 0 0; padding:0;}
        #breadcrumb li a{display:block; position:relative; margin:0; padding:0 12px 0 0; font-size:12px;}
        #breadcrumb li a::after{top:4px; right:0; content:"\f0da";}
        #breadcrumb li:last-child a{margin:0; padding:0;}
        #breadcrumb li:last-child a::after{display:none;}
        #breadcrumb .heading{margin:0; font-size:2rem;}

        /* Sidebar Navigation */
        .sidebar nav{display:block; width:100%;}
        .sidebar nav li{margin:0 0 3px 0; padding:0;}
        .sidebar nav a{display:block; position:relative; margin:0; padding:5px 10px 5px 15px; text-decoration:none; border:solid; border-width:0 0 1px 0;}
        .sidebar nav a::after{top:10px; left:5px; content:"\f0da";}
        .sidebar nav ul ul a{padding-left:35px;}
        .sidebar nav ul ul a::after{left:25px;}
        .sidebar nav ul ul ul a{padding-left:55px;}
        .sidebar nav ul ul ul a::after{left:45px;}

        /* Pagination */
        .pagination{display:block; width:100%; text-align:center; clear:both;}
        .pagination li{display:inline-block; margin:0 2px 0 0;}
        .pagination li:last-child{margin-right:0;}
        .pagination a, .pagination strong{display:block; padding:8px 11px; border:1px solid; background-clip:padding-box; font-weight:normal;}

        /* Back to Top */
        #backtotop{z-index:999; display:inline-block; position:fixed; visibility:hidden; bottom:20px; right:20px; width:36px; height:36px; line-height:36px; font-size:16px; text-align:center; opacity:.2;}
        #backtotop i{display:block; width:100%; height:100%; line-height:inherit;}
        #backtotop.visible{visibility:visible; opacity:.5;}
        #backtotop:hover{opacity:1;}


        /* Tables
        --------------------------------------------------------------------------------------------------------------- */
        table, th, td{border:1px solid; border-collapse:collapse; vertical-align:top;}
        table, th{table-layout:auto;}
        table{width:100%; margin-bottom:15px;}
        th, td{padding:5px 8px;}
        td{border-width:0 1px;}


        /* Gallery
        --------------------------------------------------------------------------------------------------------------- */
        #gallery{display:block; width:100%; margin-bottom:50px;}
        #gallery figure figcaption{display:block; width:100%; clear:both;}
        #gallery li{margin-bottom:30px;}


        /* Font Awesome Social Icons
        --------------------------------------------------------------------------------------------------------------- */
        .faico{margin:0; padding:0; list-style:none;}
        .faico li{display:inline-block; margin:8px 5px 0 0; padding:0; line-height:normal;}
        .faico li:last-child{margin-right:0;}
        .faico a{display:inline-block; width:36px; height:36px; line-height:36px; font-size:18px; text-align:center;}

        .faico a{color:inherit; background-color:rgba(255,255,255,.2);}
        .faico a:hover{color:#FFFFFF;}

        .faicon-dribble:hover{background-color:#EA4C89;}
        .faicon-facebook:hover{background-color:#3B5998;}
        .faicon-google-plus:hover{background-color:#DB4A39;}
        .faicon-linkedin:hover{background-color:#0E76A8;}
        .faicon-twitter:hover{background-color:#00ACEE;}
        .faicon-vk:hover{background-color:#4E658E;}


        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */


        /* Colours
        --------------------------------------------------------------------------------------------------------------- */
        body{color:#A5A6AA; background-color:#000000;}
        a{color:#B0CA35;}
        a:active, a:focus{background:transparent !important;}/* IE10 + 11 Bugfix - prevents grey background */
        hr, .borderedbox{border-color:#D7D7D7;}
        label span{color:#FF0000; background-color:inherit;}
        input:focus, textarea:focus, *:required:focus{border-color:#B0CA35 !important;}

        .overlay{color:#FFFFFF; background-color:inherit;}
        .overlay::after{color:inherit; background-color:rgba(0,0,0,.55);}
        .overlay.light{color:#474747;}
        .overlay.light::after{background-color:rgba(255,255,255,.7);}

        .btn, .btn.inverse:hover{color:#FFFFFF; background-color:#B0CA35; border-color:#B0CA35;}
        .btn:hover, .btn.inverse{color:inherit; background-color:transparent; border-color:inherit;}

        .coloured{color:#FFFFFF; background-color:#B0CA35;}
        .coloured .btn{color:#B0CA35; background-color:#FFFFFF;}
        .coloured .btn:hover{color:inherit; background-color:transparent; border-color:inherit;}

        .imgover:hover::before{background-color:rgba(176,202,53,.3);/* #B0CA35 */}
        .imgover, .imgover:hover::after{color:#FFFFFF;}


        /* Rows */
        .row0, .row0 a{}
        .row1{color:#FFFFFF; background-color:rgba(255,255,255,.4);}
        .row1:hover{color:#474747; background-color:#FFFFFF;}
        .row2{color:#474747; background-color:#F4F4F4;}
        .row3{color:#474747; background-color:#FFFFFF;}
        .row4{color:#A5A6AA; background-color:#000000;}
        .row5, .row5 a{color:#A5A6AA; background-color:#000000;}


        /* Top Bar */
        #topbar #searchform{color:#B0CA35;}
        #topbar #searchform input{color:#FFFFFF; background:#889C29;}
        #topbar #searchform button{color:#FFFFFF; background:transparent;}


        /* Header */
        #header #logo a{color:inherit;}


        /* Page Intro */
        #pageintro{color:#FFFFFF;}


        /* Content Area */
        .elements article, #services .elements article:hover{color:#474747; background-color:#FFFFFF; border-color:#D7D7D7;}
        .elements article:hover, #services .elements article:hover{border-color:#889C29;}
        .elements article a i{color:#B0CA35; background-color:#F4F4F4;}
        .elements article:hover a i, #introblocks .elements li:nth-child(even) article:hover a i{color:#FFFFFF; background-color:#B0CA35;}
        #introblocks .elements article:hover{box-shadow:0px 0px 15px rgba(0,0,0,.1);}
        #introblocks .elements li:nth-child(even) article{background-color:#F4F4F4;}
        #introblocks .elements li:nth-child(even) article a i{background-color:#FFFFFF;}
        #services .elements article{color:#FFFFFF; background-color:rgba(255,255,255,.2); border-color:#000000;}
        #services .elements article > p:last-of-type{border-color:#D7D7D7;}

        .shout figure figcaption a{color:inherit; background-color:inherit; border-color:#D7D7D7;}
        .shout figure:hover figcaption a, .shout figure figcaption a::after{color:#FFFFFF; background-color:#B0CA35; border-color:#B0CA35;}
        .shout figure:hover figcaption a::after{color:#B0CA35; background-color:#FFFFFF;}


        /* Footer */
        #footer .heading{color:#FFFFFF;}
        #footer hr, #footer .borderedbox, #footer .linklist li{border-color:rgba(255,255,255,.1);}

        #footer input, #footer button{border-color:transparent;}
        #footer input{color:#FFFFFF; background-color:rgba(255,255,255,.2);}
        #footer input:focus{background-color:#889C29;}
        #footer button{color:#FFFFFF; background-color:#B0CA35;}
        #footer button:hover{color:inherit; background-color:transparent; border-color:inherit;}

        #ctdetails{border-color:rgba(255,255,255,.2);}
        #ctdetails::before, #ctdetails::after{background:rgba(255,255,255,.2);}
        #ctdetails > ul li{color:inherit; background-color:rgba(255,255,255,.2);}
        #ctdetails > ul li i, #ctdetails > ul li strong{color:#FFFFFF;}
        #ctdetails > ul li a i{background-color:#B0CA35;}
        #ctdetails > ul li:nth-child(even), #ctdetails > ul li:hover{color:#FFFFFF; background-color:#889C29;}


        /* Navigation */
        #mainav li a{color:inherit;}
        #mainav .active a, #mainav a:hover, #mainav li:hover > a{color:#889C29; background-color:inherit;}
        #mainav li li a, #mainav .active li a{color:#FFFFFF; background-color:rgba(176,202,53,.5); border-color:rgba(176,202,53,.5);/* #B0CA35 */}
        #mainav li li:hover > a, #mainav .active .active > a{color:#FFFFFF; background-color:#B0CA35;}
        #mainav form select{color:#474747; background-color:#FFFFFF; border-color:#D7D7D7;}

        #breadcrumb a{color:inherit; background-color:inherit;}
        #breadcrumb li:last-child a{color:#B0CA35;}

        .container .sidebar nav a{color:inherit; border-color:#D7D7D7;}
        .container .sidebar nav a:hover{color:#B0CA35;}

        .pagination a, .pagination strong{border-color:#D7D7D7;}
        .pagination .current *{color:#FFFFFF; background-color:#B0CA35;}

        #backtotop{color:#FFFFFF; background-color:#B0CA35;}

        /* Tables + Comments */
        table, th, td, #comments .avatar, #comments input, #comments textarea{border-color:#D7D7D7;}
        th{color:#FFFFFF; background-color:#373737;}
        tr, #comments li, #comments input[type="submit"], #comments input[type="reset"]{color:inherit; background-color:#FBFBFB;}
        tr:nth-child(even), #comments li:nth-child(even){color:inherit; background-color:#F7F7F7;}
        table a, #comments a{background-color:inherit;}


        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------ */


        /* Media Queries
        --------------------------------------------------------------------------------------------------------------- */
        @-ms-viewport{width:device-width;}


        /* Max Wrapper Width - Laptop, Desktop etc.
        --------------------------------------------------------------------------------------------------------------- */
        @media screen and (min-width:1140px){
        	.hoc{max-width:1140px;}
        }

        @media screen and (min-width:978px) and (max-width:1140px){
        	.hoc{max-width:95%;}
        }


        /* Mobile Devices
        --------------------------------------------------------------------------------------------------------------- */
        @media screen and (max-width:978px){
        	.hoc{max-width:90%;}
        
        	#topbar{}
        
        	#header{padding:30px 0;}
        	#header #logo{margin-top:0;}
        
        	#mainav{}
        	#mainav ul{display:none;}
        	#mainav form{display:block; margin-top:2px;}
        
        	#breadcrumb{}
        
        	.container{}
        	#comments input[type="reset"]{margin-top:10px;}
        	.pagination li{display:inline-block; margin:0 5px 5px 0;}
        
        	#footer{}
        
        	#copyright{}
        	#copyright p:first-of-type{margin-bottom:10px;}
        }

        @media screen and (min-width:750px) and (max-width:900px){
        	#introblocks .elements article{padding-left:15px;}
        	#services .elements article{padding:20px;}
        	#services .elements article > div{padding:0;}
        	#introblocks .elements article footer, #services .elements article > div footer{position:inherit; top:auto; left:auto; margin-bottom:20px;}
        }

        @media screen and (max-width:750px){
        	.imgl, .imgr{display:inline-block; float:none; margin:0 0 10px 0;}
        	.fl_left, .fl_right{display:block; float:none;}
        	.group .group > *:last-child, .clear .clear > *:last-child, .clear .group > *:last-child, .group .clear > *:last-child{margin-bottom:0;}/* Experimental - Needs more testing in different situations, stops double margin when stacking */
        	.one_half, .one_third, .two_third, .one_quarter, .two_quarter, .three_quarter{display:block; float:none; width:auto; margin:0 0 30px 0;}
        
        	#topbar{text-align:center;}
        	#topbar > div:first-of-type ul{margin:0 0 10px 0;}
        	#topbar #searchform{display:none;}/* This is personal preference - remove if not required */
        
        	#header{text-align:center;}
        	#header #logo{margin:0 0 15px 0;}
        
        	#pageintro article{max-width:none;}
        	#pageintro .heading{margin-bottom:20px; font-size:2.5rem;}
        	#pageintro article p:last-of-type{line-height:1.4; font-size:1.2rem;}
        
        	.sectiontitle{max-width:none;}
        	.shout figure{margin:0 auto 30px;}
        	.elements-three li:nth-last-child(-n+3){margin-bottom:30px;}
        	.elements-three li:last-child, .shout figure:last-child{margin-bottom:0;}
        
        	#ctdetails{margin-bottom:80px;}/* Gives good separation between the two elements */
        
        	#footer{padding-bottom:50px;}/* Not needed - just looks better */
        	#footer .latestimg > li, #footer .latestimg > li:nth-last-child(-n+3){display:inline-block; float:none; width:auto; margin:0 5% 5% 0;}
        	#footer .latestimg > li:last-child{margin-bottom:0;}
        	#footer .latestimg > li img{width:auto;}
        }

        @media screen and (min-width:451px) and (max-width:900px){
        	.pr-charts .pr-chart-ctrl{width:50%; margin-bottom:50px;}
        	.pr-charts .pr-chart-ctrl:nth-child(n+3){margin-bottom:0;}
        }

        @media screen and (max-width:450px){
        	#topbar > div:first-of-type ul li{display:block; margin:0;}
        
        	#services .elements article > div{padding:0;}
        	#services .elements article > div footer{position:inherit; top:auto; left:auto; margin-bottom:20px;}
        
        	.pr-charts .pr-chart-ctrl{width:100%; margin-bottom:50px;}
        	.pr-charts .pr-chart-ctrl:last-child{margin-bottom:0;}
        }

        html{overflow-y:scroll; overflow-x:hidden;}
        html, body{margin:0; padding:0; font-size:14px; line-height:1.6em;}

        *, *::before, *::after{box-sizing:border-box;}
}
        .bold{font-weight:bold;}
        .center{text-align:center;}
        .right{text-align:right;}
        .uppercase{text-transform:uppercase;}
        .capitalise{text-transform:capitalize;}
        .hidden{display:none;}
        .nospace{margin:0; padding:0; list-style:none;}
        .block{display:block;}
        .inline{display:inline-block;}
        .justified{text-align:justify;}
        .inline *{display:inline-block;}
        .inline *:last-child{margin-right:0;}
        .pushright li{margin-right:20px;}
        .pushright li:last-child{margin-right:0;}
        .borderedbox{border:1px solid;}
        .overlay{position:relative; z-index:1;}
        .overlay::after{display:block; position:absolute; top:0; left:0; width:100%; height:100%; content:""; z-index:-1;}
        .bgded{background-position:top center; background-repeat:no-repeat; background-size:cover;}
        .circle{border-radius:50%; background-clip:padding-box;}

        .logoname{margin:0; padding:0; font-size:2rem; font-variant:small-caps;}
        .logoname::first-letter, .logoname span{font-weight:700;}

        .btn, button.btn{display:inline-block; padding:8px 25px 10px; text-transform:uppercase; font-size:1.2rem; font-weight:400; border:1px solid;}
        button.btn{cursor:pointer;}

        .clear, .group{display:block;}
        .clear::before, .clear::after, .group::before, .group::after{display:table; content:"";}
        .clear, .clear::after, .group, .group::after{clear:both;}

        a{outline:none; text-decoration:none;}

        .fl_left, .imgl{float:left;}
        .fl_right, .imgr{float:right;}

        img{width:auto; max-width:100%; height:auto; margin:0; padding:0; border:none; line-height:normal; vertical-align:middle;}
        .imgl{margin:0 15px 10px 0; clear:left;}
        .imgr{margin:0 0 10px 15px; clear:right;}
        .imgover{display:inline-block; position:relative; max-width:100%;}
        .imgover::before, .imgover::after{display:block; position:absolute; content:""; text-align:center; opacity:0;}
        .imgover::before{top:0; right:0; bottom:0; left:0;}
        .imgover::after{top:50%; left:50%; width:50px; height:50px; line-height:50px; margin:-25px 0 0 -25px; font-family:"Font Awesome\ 5 Free"; font-weight:900; content:"\f067";/* fa-plus */ font-size:28px;}
        .imgover:hover::before, .imgover:hover::after{opacity:1;}


        /* Fonts
        --------------------------------------------------------------------------------------------------------------- */
        body, input, textarea, select{font-family:Verdana, Geneva, sans-serif;}
        h1, h2, h3, h4, h5, h6, .heading{font-family:Georgia, "Times New Roman", Times, serif;}


        /* Forms
        --------------------------------------------------------------------------------------------------------------- */
        form, fieldset, legend{margin:0; padding:0; border:none;}
        legend{display:none;}
        label, input, textarea, select, button{display:block; resize:none; outline:none; color:inherit; font-size:inherit; font-family:inherit; vertical-align:middle;}
        label{margin-bottom:5px;}
        :required, :invalid{outline:none; box-shadow:none;}
        ::placeholder{opacity:1;}/* Makes sure the placeholder text is not transparent */


        /* Generalise
        --------------------------------------------------------------------------------------------------------------- */
        h1, h2, h3, h4, h5, h6, .heading{margin:0 0 20px 0; font-size:1.4rem; line-height:normal; font-weight:normal; text-transform:capitalize;}
        .heading.nospace{margin-bottom:0;}

        address{font-style:normal; font-weight:normal;}
        hr{display:block; width:100%; height:1px; border:solid; border-width:1px 0 0 0;}

        .font-xs{font-size:1rem;}
        .font-x2{font-size:2.2rem;}
        .font-x3{font-size:3.2rem;}

        .wrapper{display:block; position:relative; width:100%; margin:0; padding:0; text-align:left; word-wrap:break-word;}
        /*
        The "hoc" class is a generic class used to centre a containing element horizontally
        It should be used in conjunction with a second class or ID
        */
        .hoc{display:block; margin:0 auto;}


        /* HTML 5 Overrides
        --------------------------------------------------------------------------------------------------------------- */
        address, article, aside, figcaption, figure, footer, header, main, nav, section{display:block; margin:0; padding:0;}


        /* Grid - RS-MQF 1140 V.2 - https://www.os-templates.com/free-basic-html5-templates/rs-mqf-1140
        --------------------------------------------------------------------------------------------------------------- */
        .one_half, .one_third, .two_third, .one_quarter, .two_quarter, .three_quarter{display:inline-block; float:left; margin:0 0 0 4.21052%; list-style:none;}

        .first{margin-left:0; clear:left;}

        .one_quarter{width:21.8421%;}
        .one_third{width:30.52631%;}
        .one_half, .two_quarter{width:47.89473%;}
        .two_third{width:65.26315%;}
        .three_quarter{width:73.94736%;}


        /* Spacing
        --------------------------------------------------------------------------------------------------------------- */
        .btmspace-10{margin-bottom:10px;}
        .btmspace-15{margin-bottom:15px;}
        .btmspace-20{margin-bottom:20px;}
        .btmspace-30{margin-bottom:30px;}
        .btmspace-50{margin-bottom:50px;}
        .btmspace-80{margin-bottom:80px;}

        .rgtspace-5{margin-right:5px;}
        .rgtspace-10{margin-right:10px;}
        .rgtspace-15{margin-right:15px;}
        .rgtspace-20{margin-right:20px;}
        .rgtspace-30{margin-right:30px;}

        .inspace-5{padding:5px;}
        .inspace-10{padding:10px;}
        .inspace-15{padding:15px;}
        .inspace-20{padding:20px;}
        .inspace-30{padding:30px;}
        /* Other
        --------------------------------------------------------------------------------------------------------------- */
        @media screen and (max-width:650px){
        	.scrollable{display:block; width:100%; margin:0 0 30px 0; padding:0 0 15px 0; overflow:auto; overflow-x:scroll;}
        	.scrollable table{margin:0; padding:0; white-space:nowrap;}
        
        	.inline li{display:block; margin-bottom:10px;}
        	.pushright li{margin-right:0;}
        
        	.font-x2{font-size:1.6rem;}
        	.font-x3{font-size:1.8rem;}
        }
        </style>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="bgded" style="background-image:url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Vista_panor%C3%A1mica_de_Potos%C3%AD.jpg/1000px-Vista_panor%C3%A1mica_de_Potos%C3%AD.jpg');"> 
            <div class="wrapper overlay row0">
                <div id="topbar" class="hoc clear">
                <div class="fl_left"> 
                <ul class="nospace">
          <li><i class="fas fa-phone rgtspace-5"></i> +591 68392417</li>
          <li><i class="far fa-envelope rgtspace-5"></i> armandohector8@gmail.com</li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
      <div class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="nospace">
            @if (Route::has('login'))
                @auth
                    <li><a href="{{ url('/home') }}" class="text-sm text-gray-700 underline"><i class="fas fa-home"></i>Home</a>
                @else
                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><i class="fas fa-sign-in-alt"></i>Log in</a>
                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline"><i class="fas fa-edit"></i>Register</a>
                    @endif
                @endauth
            @endif
        </ul>
        <!-- ################################################################################################ -->
      </div>
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left"> 
        <!-- ################################################################################################ -->
        <h1 class="logoname"><a href="#">Imprenta<span>Rivadavia</span></a></h1>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li class="active"><a href="#">Somos un excelente servicio</a></li>
          
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper overlay">
    <div id="pageintro" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <article>
        <p>Somo la mejor imprenta de Potosí</p>
        <h3 class="heading">Imprenta Rivadavia</h3>
        <p>Porque como potosino te mereces la mejor atención con servicios garantizados.</p>
        <footer>
          <ul class="nospace inline pushright">
            <li><a class="btn inverse" href="#">El único liminte es la imaginación</a></li>
          </ul>
        </footer>
      </article>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <section id="introblocks">
      <ul class="nospace group elements elements-three">
        <li class="one_third">
          <article>
            <footer><a href="#"><i class="fas fa-balance-scale"></i></a></footer>
            <h6 class="heading">Misión</h6>
            <p>En Imprenta Rivadavia nuestra misión es ser una organización integral de artes gráficas, que satisfaga todas las necesidades de impresión en cuanto a calidad, rapidez y eficiencia que nuestros clientes requieren; apoyándonos en la excelencia de nuestro capital humano y tecnología de vanguardia.</p>
          </article>
        </li>
        <li class="one_third">
          <article>
            <footer><a href="#"><i class="fas fa-basketball-ball"></i></a></footer>
            <h6 class="heading">Visión</h6>
            <p>Así mismo tenemos la firme visión de ser una de las empresas de artes gráficas de referencia en el municipio y en el estado, por su excelencia en sus trabajos de impresión, en el trato de su gente, en la protección del medio ambiente y sobre todo en la satisfacción plena de todos nuestros clientes.</p>
          </article>
        </li>
        <li class="one_third">
          <article>
            <footer><a href="#"><i class="fas fa-beer"></i></a></footer>
            <h6 class="heading">Objetivo</h6>
            <p>Todo esto a través de tecnologías, procesos creativos y de producción integrados, asegurando, la seguridad de los procesos e integridad de las personas, contribuyendo al bienestar de las áreas donde operamos a largo plazo con nuestros clientes, proveedores y colaboradores.</p>
          </article>
        </li>
        <li class="one_third">
          <article>
            <footer><a href="#"><i class="fas fa-blind"></i></a></footer>
            <h6 class="heading">Nuestros Trabajos</h6>
            <p>Nuestro trabajos son de muy buena calidad y de precio accessible</p>
          </article>
        </li>
        <li class="one_third">
          <article>
            <footer><a href="#"><i class="fas fa-bus"></i></a></footer>
            <h6 class="heading">Atención</h6>
            <p>Nuestra atención es bridar la mejor atencion al cliente para un mejor resultado.</p>
          </article>
        </li>
        <li class="one_third">
          <article>
            <footer><a href="#"><i class="fas fa-cut"></i></a></footer>
            <h6 class="heading">Puntualidad</h6>
            <p>La puntualidad es importante en nuestra empresa, confía en nosotros</p>
          </article>
        </li>
      </ul>
    </section>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('https://www.lostiempos.com/sites/default/files/styles/noticia_detalle/public/media_imagen/2020/12/9/centro_historio_1.jpg?itok=dvpcVOwo');">
  <section id="services" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">Nuestros trabajos</p>
      <h6 class="heading font-x2">Realizamos distintos trabajos así como ser:</h6>
    </div>
    <ul class="nospace group elements elements-three">
      <li class="one_third">
        <article>
          <div>
            <footer><a href="#"><i class="fas fa-credit-card"></i></a></footer>
            <h6 class="heading">Tarjetas</h6>
          </div>
          <p>Aliquam id imperdiet nec odio proin luctus consequat est phasellus sed libero vitae turpis dignissim varius nullam eu tellus aenean sit amet risus fusce.</p>
          <p><a href="#">Con descuento</a></p>
        </article>
      </li>
      <li class="one_third">
        <article>
          <div>
            <footer><a href="#"><i class="fas fa-compress"></i></a></footer>
            <h6 class="heading">Tripticos</h6>
          </div>
          <p>Sit amet augue lobortis risus imperdiet blandit nullam vitae dui fusce gravida sem ac auctor eleifend sapien dui convallis erat a cursus velit diam et.</p>
          <p><a href="#">Con descuento</a></p>
        </article>
      </li>
      <li class="one_third">
        <article>
          <div>
            <footer><a href="#"><i class="fas fa-futbol"></i></a></footer>
            <h6 class="heading">Bipticos</h6>
          </div>
          <p>Urna suspendisse suscipit metus vel sem integer porta in hac habitasse platea dictumst aliquam quis nunc aenean augue proin molestie erat in rhoncus.</p>
          <p><a href="#">Con descuento</a></p>
        </article>
      </li>
      <li class="one_third">
        <article>
          <div>
            <footer><a href="#"><i class="fas fa-fire-extinguisher"></i></a></footer>
            <h6 class="heading">Talonarios</h6>
          </div>
          <p>Posuere nibh quam consectetuer lectus ac vulputate ligula lorem ut dolor morbi ut risus nec orci bibendum commodo integer sem nisl mollis ut ornare eu.</p>
          <p><a href="#">Con descuento</a></p>
        </article>
      </li>
      <li class="one_third">
        <article>
          <div>
            <footer><a href="#"><i class="fas fa-medkit"></i></a></footer>
            <h6 class="heading">Banners</h6>
          </div>
          <p>Lobortis eget ante mauris tempor suspendisse nulla donec tincidunt tellus ac quam in eget risus phasellus faucibus adipiscing velit maecenas volutpat.</p>
          <p><a href="#">Con descuento</a></p>
        </article>
      </li>
      <li class="one_third">
        <article>
          <div>
            <footer><a href="#"><i class="fas fa-recycle"></i></a></footer>
            <h6 class="heading">Empastes y muchos otros mas</h6>
          </div>
          <p>Aliquam leo aliquam at odio mauris egestas interdum magna libero vivamus malesuada adipiscing sapien morbi arcu pharetra eu interdum quis blandit ac.</p>
          <p><a href="#">Con descuento</a></p>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">El sistema es muy facil de usar</p>
      <h6 class="heading font-x2">Registrate y empieza a hacer pedidos, contamos con:</h6>
    </div>
    <ul class="pr-charts nospace group center">
      <li class="pr-chart-ctrl" data-animate="false">
        <div class="pr-chart" data-percent="25"><i></i></div>
        <p><a class="btn" href="#">Delivery</a></p>
      </li>
      <li class="pr-chart-ctrl" data-animate="false">
        <div class="pr-chart" data-percent="50"><i></i></div>
        <p><a class="btn" href="#">Cancelacion por tarjeta</a></p>
      </li>
      <li class="pr-chart-ctrl" data-animate="false">
        <div class="pr-chart" data-percent="75"><i></i></div>
        <p><a class="btn" href="#">Consultas Gratuitas</a></p>
      </li>
      <li class="pr-chart-ctrl" data-animate="false">
        <div class="pr-chart" data-percent="100"><i></i></div>
        <p><a class="btn" href="#">Impresion de proformas virtuales</a></p>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper coloured">
  <article id="cta" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <p>Nuestra Dirección</p>
    <h6 class="heading">Puedes encontrarnos en:</h6>
    <footer><iframe src="https://www.google.com/maps/embed?pb=!4v1624849301039!6m8!1m7!1s7DuOs4vS-3-er41tYHfaqQ!2m2!1d-19.58578606492758!2d-65.75805300927425!3f276.48378469510243!4f-2.268167845259171!5f0.7820865974627469" width="1200" height="600" style="border-radius:50px;" allowfullscreen="" loading="lazy"></iframe></footer>
    <!-- ################################################################################################ -->
  </article>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay row4" style="background-image:url('images/demo/backgrounds/01.png');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <figure id="ctdetails">
      <ul class="nospace group">
        <li class="one_third first">
          <div class="clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Llámanos:</strong> +591 68392417</span></div>
        </li>
        <li class="one_third">
          <div class="clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Mandanos un mensaje:</strong> armandohector8@gmail.com</span></div>
        </li>
        <li class="one_third">
          <div class="clear"><a href="#"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Visitanos:</strong> Calle Fortunato Gumiel Nro.34 </span></div>
        </li>
      </ul>
    </figure>
    <!-- ################################################################################################ -->
   
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2021 - All Rights Reserved - <a href="#">Hector Quispe</a></p>
    <p class="fl_right">Created by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">D4N0</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- Homepage specific -->
<script src="layout/scripts/jquery.easypiechart.min.js"></script>
<!-- / Homepage specific -->
</body>
</html>