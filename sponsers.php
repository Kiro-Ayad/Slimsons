<!DOCTYPE html>
<html>

<head>
    <?php
include "sarver.php";
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>SlimSons sponsors</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">

    <style>
         body{
            background-color: rgba(54, 194, 194, 0.633);
            background-color: #9edcff;
            /* background-image: url('images/bluepic.jpg'); */
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Overpass', sans-serif;
        }
        #open {
            font-size: 45px;
            position: absolute;
            cursor: pointer;
            transition: margin-left .5s;
            padding: 16px;
        }
        #header{
            /* background-image: url('images/wallpaper.gif'); */
            width: 100%;
            height: 170px;
            z-index: 1;
            position: relative;
            background-color: #1d4ba696;
            box-shadow: 0px 2px 60px -20px #197EC0FF;
        }
       #h2{
            float: right;
            transform: translate(-450px, 100px);
        }
        #headerborder{ 
            margin-bottom: 20px;
            background-color: #e87e41;
            width: 98%;
            height: 50px;
            transform: translate(15px, 107px);
            z-index: -1;
            position: absolute;
            border-radius: 5px;
        }
        #useravatar{
                /* float: right; */
            transform: translate(600px, 40px);
            background-color: #91d3f6;
            border-radius: 100px;
            /* box-shadow: 0px -8px 55px -6px rgba(0,0,0,0.49); */
            border: solid 1px #91d3f6;
            /* box-shadow: 0px -8px 55px -6px rgb(43 62 72 / 26%); */
            padding: 2px;
        }
         #links {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color:#FED439FF;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
    }
    .links .close{
            padding: 8px;
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            color:#195978;
        }
        #links>button{
            text-align: left;
            background: none;
            border: none;
            
        }
        #links>a , #links>button{
            cursor: pointer;
            font-size: larger;
            padding:20px;
            text-decoration: none;
           color:#195978;
            display: block;
            transition: 0.3s;
        }
        #links>a:hover , #links>button:hover , #links>span:hover{
            /* color: #d15c3e; */
            color: #E55A36;
        }
        .otherpagelinks {
            display: inline-block;
            position: relative;            
            width: 200px;
            }
        .otherpagelinks:after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #0087ca;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
            }

        .otherpagelinks:hover:after {
            transform: scaleX(1);
            transform-origin: bottom left;
            }
        #logout>img{
            /* justify-self: flex-end; */
            transform: translate(5px, 3px);
        }
        header{
            height: 200px;
        }
        #top, #intro{
            text-align: center;
            transform: translate(0px, 30px);
        }
        #intro{
            font-size: large;
        }
        h2{
            text-align: left;
            padding:  13px 30px;
            /* background-color: rgba(255, 255, 255, 0.351); */
            /* background-color: #fff; */
            background-color: #ff8842;
            margin: 0px 65px;
            width: fit-content;
            border-radius: 10px 10px 0px 0px; 
            box-shadow: -2px 16px 51px -13px rgb(59 2 9);
        }
        h2:hover{
            padding:  13px 34px;
            transition: 2sec;
            
        }
            /* logos, branches and address(display none) container */
        .sponsors{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
            padding: 20px 0px;
            margin: 0px 55px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 10px;
            /* box-shadow: -2px 16px 51px -13px rgba(0,0,0,0.8); */
            box-shadow: 0px 2px 90px -20px #197EC0FF;
            
        }
        .sponsors img{
                width: 200px;
                height: 200px;
                /* background-color: white; */
                opacity: 1;
                transform: scale(1);
        }
        .button>img:hover{
            /* background-color: #5296960e; */
            border-radius: 45%;
            transform: scale(1.17);
            /* box-shadow: -2px 16px 51px -13px rgba(2, 249, 224, 0.307); */
        }
        .sponsorModal{
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            height: 170%;
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(42, 66, 66, 0.556); /* Black w/ opacity */
        }
        .sponsorModal:target{
            display: flex;
            position: absolute;
            justify-content: center;         
        }
        .modalContent{
            background-color: #fff;
            border-radius: 10px;
            display: flex;
            width: 50%;
            justify-content: space-around;
            height: fit-content;
            position: fixed;
        }
        .modalContent> img{
            margin: 10px;
            align-self: center;
            margin-bottom: 20px;
        }
        .branches{
            display: flex;
            flex-wrap: wrap;
            height: 25%;
            align-self: center;
            
            /* background-color: rgba(54, 194, 194, 0.633); */
        }
        .closebtn{
            text-decoration: none;
            font-weight: bolder;
            font-size: xx-large;
            margin: 10px;
        }
        .closebtn:hover{
            color: rgb(126, 128, 131);
        }
            /* address hover details */
        .branch {
            position: relative;
            align-self: center;
            cursor: pointer;
            text-decoration: underline dotted;
        }
        td{
            text-align: left;
            vertical-align: middle;
            padding: 0px 10px;
        }
         .branch .address{
            visibility: hidden;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            width: 120px;
            top: 100%;
            left: 50%; 
            margin-left: -60px;
            }
            .branch:hover .address{
            visibility: visible;
            }
            .branch .address::after {
                content: " ";
                position: absolute;
                bottom: 100%;  /* At the top of the tooltip */
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: transparent transparent black transparent;
            }
            #wave{
            display: flex;
            width: 100%;
            height: 250px;
        }
    </style>
     <?php
$id=$_GET['user_id'];
$qry1 = mysqli_query($db,"select * from user where user_id='$id'");
$ro = mysqli_fetch_array($qry1);
?>
</head>
<body>
<nav id="header">
        <div id="open">
            <span onclick="openNav()">&#9776;</span> </div>
        <div id="headerborder"></div>
        <h1 id="h2"><?php echo $ro['name'] ?></h1>
        <img src="<?php echo $ro['avatar'] ?>" width="120px" id="useravatar">
        </nav>
    <!-- <img id="img" src="images/char3sqr.png"> -->
    <aside id="links" class="links">
        <span class="close" onclick="closeNav()">&times;</span>
        <?php 
                if($ro['sub_id']=='1'){?>
                <a  class="otherpagelinks" href="userprofilebasic.php">Home</a>
                <?php
                }else { ?>
                    <a  class="otherpagelinks" href="userprofilepremium.php">Home</a>
                <?php } ?>
                
                <a  class="otherpagelinks" href="exercises.php?user_id=<?php echo $ro['user_id']; ?>">Exercises</a>
                <?php 
                if($ro['sub_id']=='1'){?>
                <a  class="otherpagelinks"  href="basicmeal.php?user_id=<?php echo $ro['user_id']; ?>">meals</a>
                <?php
                }else { ?>
                    <a  class="otherpagelinks"  href="meals.php?user_id=<?php echo $ro['user_id']; ?>">meals</a>
                <?php } ?>
                
                <a  class="otherpagelinks" href="vedio.php?user_id=<?php echo $ro['user_id']; ?>">Reviews</a>
                <a  class="otherpagelinks" href="sponsers.php?user_id=<?php echo $ro['user_id']; ?>">Our Sponsors</a>
                <a class="otherpagelinks" href="newedit.php?user_id=<?php echo $ro['user_id']; ?>">Edit Info</a>
                <a  class="otherpagelinks" href="editsubscription.php?user_id=<?php echo $ro['user_id']; ?>">Edit Subscription</a>
                <a href="userprofilepremium.php?logout='1'" id="logout">Log Out
                    <img src="images/export.png" width="20px" alt="logout">
                </a>
            
    </aside>
    <header>
        <h1 id="top">Meet our Sponsors</h1>
        <P id="intro">This is our collection of the finest and most trustworthy brands.</P>
    </header>
    
    <section>
        <h2 > Healthy Supermarkets</h2>
        <div id="supermarkets" class="sponsors">
            <a class="button" href="#healthy"><img id="market1" src="images/healthy&tasty.png" alt="logo of healthy and tasty supermarket" ></a>
            <div id="healthy" class="sponsorModal">
                <div class="modalContent">
                        <a href="#" class="closebtn">×</a>
                        <img id="market1" src="images/healthy&tasty.png" alt="logo of healthy and tasty supermarket">
                        <article class="branches"><table><tr>
                            <td><p class="branch">Sheikh Zayed <span class="address">- Al Moez Mall Sheikh Zayed behind the Canadian University Building A1.</span> </p></td>
                            <td><p class="branch">Obour<span class="address">- Avenue Mall, 9th District.</span></p></td>
                            <td><p class="branch">Shoubra <span class="address">- No. 257, Shubra Street, near Minya Al-Serge, Houd Ali Pasha Sharif.</span></p></td></tr>
                            <tr><td><p class="branch">Zamalek <span class="address">- 51 Mohamed Mazhar St., Zamalek.</span></p></td>
                            <td><p class="branch">Mohandessin <span class="address">- 40 Syria Street Mohandessin. <br>
                                - 13 Abdel Moneim Riad Street.</span></p></td>
                            <td><p class="branch">New Cairo <span class="address">- Abdul Hamid St., Gouda, Sohar Mall 6, Violet 9, the first assembly, next to Al-Radi for vegetables.<br>
                                - Grand Plaza Mall, Shop No. (S5 - 3) in the second district services area in the Fifth District.</span></p></td></tr>
                            <tr><td><p class="branch">Haram <span class="address">- 42 El Haram St., next to Papa John's Pizza.</span></p></td>
                            <td><p class="branch">6th of October<span class="address">- October 6, District 3, First Mall, in front of the Institute of Engineering and Technology.<br>
                                - 41 Central Axis St., in front of Al-Hosary Mosque.</span></p></td>
                            <td><p class="branch">Dokki<span class="address">- 18 Mesaha Square in front of Vodafone.</span></p></td></tr>
                            <tr><td><p class="branch">Helwan<span class="address">- 40 Sherif St., next to the farmer's liver, before McDonald's.</span></p></td>
                            <td><p class="branch">Hadayek El Ahram<span class="address">- 301 A, Mineral Wealth Street, next to Bouar, the first gate, Al-Ahram Gardens.</span></p></td>
                            <td><p class="branch">Maadi<span class="address">- 45 Al-Nasr St., Algeria Square, below the furniture of Egypt.<br>
                                - Street 233 Degla Maadi.<br>
                                - Building (31) from the division of plot (4) investment land, Katameya Ring Road, next to Carrefour.</span></p></td></tr>
                            <tr><td><p class="branch">Ain Shams<span class="address">- 108 Martyr Ahmed Esmat St., before Modern School and next to the Church of the Virgin and Archangel Michael.</span></p></td>
                            <td><p class="branch">El Shorouk City<span class="address">- Sixth plot, El Shorouk City, in front of Heliopolis Mall, Panorama El Shorouk 1.</span></p></td>
                            <td><p class="branch">Hadayek El Kobba<span class="address">- 115 Masr and Sudan Street.</span></p></td></tr>
                            <tr><td><p class="branch">Al Mokatam<span class="address">- 9110 Street 9 next to Farghaly Juice and in front of Hosni El Kababgy.<br>
                                - 28 Street 9 in Mokattam, Plot No. 391, District (D), formerly Radio Shack, next to Heart Attack.</span></p></td>
                            <td><p class="branch">Faisal<span class="address">- 116 Faisal Main Street, in front of Laban Branch.</span></p></td>
                            <td><p class="branch">Heliopolis<span class="address">- 23 El Hegaz Street in front of Maryland Park, next to McDonald's.<br>
                            - 125 Hejaz next to Heliopolis Hospital.<br>
                            - 86 Asmaa Fahmy Ard El Golf in front of the administrative control.</span></p></td></tr>
                            <tr><td><p class="branch">Al Rehab City<span class="address">- Shop No. 235, Old Market, Al Rehab, First Settlement.</span></p></td>
                            <td><p class="branch">Masaken Sheraton<span class="address">- 40 Al-Rashidi Street, next to Al-Nozha Hospital, Sheraton Bldgs.</span></p></td>
                            <td><p class="branch">Nasr City<span class="address">- Rehana Plaza Hotel, 10th District.<br>
                                - 3 Abdel Hamid Lotfi Street, the extension of Makram Ebeid, directly next to the power of attorney for Raya.<br>
                                - 34 Abdullah Al Arabi St., Extension of Aviation, 7th District, in front of Hardee's and Vodafone.</span></p></td></tr>
                            </table></article>
                        </div>
                </div>

            <a class="button" href="#gourmet"><img id="market2" src="images/gourmet.png" alt="logo of gourmet supermarket"></a>
            <div id="gourmet" class="sponsorModal">
                <div class="modalContent">
                    <a href="#" class="closebtn">×</a>
                    <img id="market2" src="images/gourmet.png" alt="logo of gourmet supermarket">
                    <article class="branches"><table>
                        <tr><td><p class="branch">Maadi<span class="address">- 2, Road 218, Degla.</span></p></td>
                        <td><p class="branch">Zamalek<span class="address">- Guizera Plaza Mall, Sheikh Zayed3 Brazil Street.</span></p></td></tr>
                        <tr><td><p class="branch">Fifth Settlement<span class="address">- Bouri Center Road 17.</span></p></td>
                        <td><p class="branch">Heliopolis<span class="address">- City Stars Mall (Phase 2 | Level 0).</span></p></td></tr>
                    </table></article>
                </div>
            </div>
            <a class="button" href="#fresh"><img id="market3" src="images/freshfood.png" alt="logo of fresh food market supermarket"></a>
            <div id="fresh" class="sponsorModal">
                <div class="modalContent">
                    <a href="#" class="closebtn">×</a>
                    <img id="market3" src="images/freshfood.png" alt="logo of fresh food market supermarket">
                    <article class="branches"><table>
                        <tr><td><p class="branch">Sheikh Zayed<span class="address">- Plaza 34 Building.</span></p></td>
                        <td><p class="branch">New Cairo<span class="address">- Point 90 Mall - In Front Of AUC Gate 5.</span></p></td></tr>
                        <tr><td colspan="2" style="text-align: center;"><p class="branch">6th of October<span class="address">- Street 88 , Palm Hills Compound.</span></p></td></tr>
                    </table></article>
                </div>
            </div>
        </div>
        <h2> Restaurants </h2>
        <div id="restaurants" class="sponsors">
            <a class="button" href="#house"><img id="res1" src="images/dietHouse.png" alt="logo of diet house restaurant"></a>
            <div id="house" class="sponsorModal">
                <div class="modalContent">
                    <a href="#" class="closebtn">×</a>
                    <img id="res1" src="images/dietHouse.png" alt="logo of diet house restaurant">
                    <article class="branches"><table>
                        <tr><td><p class="branch">New Cairo<span class="address">- First Settlement, Mirage Mall.</span></p></td>
                        <td><p class="branch">Maadi<span class="address">- 10074 Carrefour Street, City Center Building, under King.</span></p></td></tr>
                        <tr><td colspan="2" style="text-align: center;"><p class="branch">Heliopolis<span class="address">- 101 Shehab El Dean Khafaga.</span></p></td></tr>
                    </table></article>
                </div>
            </div>
            <a class="button" href="#calories"><img id="res3" src="images/calories.png" alt="logo of calories restaurant"></a>
            <div id="calories" class="sponsorModal">
                <div class="modalContent">
                    <a href="#" class="closebtn">×</a>
                    <img id="res3" src="images/calories.png" alt="logo of calories restaurant">
                    <article class="branches"><table>
                        <tr><td><p class="branch">Maadi<span class="address">- 46 El Nassr Street.</span></p></td>
                        <td><p class="branch">Dokki<span class="address">- Mecca Street, behind Shooting Club.</span></p></td></tr>
                        <tr><td><p class="branch">Al Rehab City<span class="address">- Avenue Mall.</span></p></td>
                        <td><p class="branch">Heliopolis<span class="address">- 44 Nakhla El Motaey St., Heliopolis.</span></p></td></tr>
                    </table></article>
                </div>
            </div>
            <a class="button" href="#delight"><img id="res4" src="images/delight.png" alt="logo of diet delight restaurant"></a>
            <div id="delight" class="sponsorModal">
                <div class="modalContent">
                    <a href="#" class="closebtn">×</a>
                    <img id="res4" src="images/delight.png" alt="logo of diet delight restaurant">
                    <article class="branches">
                        <p class="branch">Fifth Settlement<span class="address">- Plot 173Industrial Zone, 3rd Compound, CAIRO.</span></p>
                    </article>
                </div>
            </div>
        </div>         
        <h2> Gyms </h2>
        <div id="gyms" class="sponsors">
            <a class="button" href="#gold"><img id="gym1" src="images/gold.png" alt="logo of golds gym"></a>
            <div id="gold" class="sponsorModal">
                <div class="modalContent">
                    <a href="#" class="closebtn">×</a>
                    <img id="gym1" src="images/gold.png" alt="logo of golds gym">
                    <article class="branches"><table>
                        <tr><td><p class="branch">Heliopolis<span class="address">- 9 ibn battouta st.<br>
                            - 18 salah el dien st., off salah salem st., near to mobil gas station.<br>
                            - anqara st., beside hassan allam co.</span></p></td>
                        <td><p class="branch">New cairo<span class="address">- inside golden heights Compound gate 4.<br>
                            - Ring road inside Katameya heights golf and tennis resort.<br>
                            - El tesaeen el ganouby st., inside concord plaza mall.</span></p></td></tr>
                        <tr><td><p class="branch">6 of october<span class="address">- Gamal abd el naser st., green heights compound, 2nd northern touristic zone, infront of engineers syndicate club.<br>
                            - beverly hills compound.<br>
                            - inside misr University for science and Technology.</span></p></td>
                        <td><p class="branch">Haram<span class="address">- 9 el haram st., near to Carrefour.</span></p></td></tr>
                        <tr><td><p class="branch">Mohandessin<span class="address">- 18 demascus st., off syria st.</span></p></td>
                        <td><p class="branch">Zamalek<span class="address">- 3 taha hussein st.</span></p></td></tr>
                        <tr><td><p class="branch">Obour<span class="address">- plot 7 block 12001 1st industrial zone, northern extension,inside avenue cairo mall 1st floor.</span></p></td>
                        <td><p class="branch">Maadi<span class="address">- 1 road 9 floor 8 el mahtta sq., maddi palace bldg.</span></p></td></tr>
                    </table></article>
                </div>
            </div>

            <a class="button" href="#h2o"><img id="gym2" src="images/h2o.png" alt="logo of h2o gym"></a>
            <div id="h2o" class="sponsorModal">
                <div class="modalContent">
                    <a href="#" class="closebtn">×</a>
                    <img id="gym2" src="images/h2o.png" alt="logo of h2o gym">
                    <article class="branches"><table>
                        <tr><td><p class="branch">Heliopolis<span class="address">
                            - 7 hussein shafiq st., infront of el shams club.<br>
                            - 90 mohamed farid st., off farid semeika st.</span></p></td>
                        <td><p class="branch">Maadi<span class="address">
                            - rd. 263 off el nasr st.,in front of steak out restaurant.<br>
                            - 27A rd.,263 off maddi.</span></p></td>
                        <td><p class="branch">Manial<span class="address">
                            - 38 lmeqias st., el mamalik sq. above kirdan cafe and restaurant.<br>
                        - 67 abd el aziz al saoud st.</span></p></td></tr>
                        <tr><td><p class="branch">El Mokattam<span class="address">- plot 9487 karim banouna st.</span></p></td>
                        <td><p class="branch">Nasr city<span class="address">
                            - 2/4 anwar el mofty st., behind tiba outlet mall.<br>
                            - 47 abdelrazeq el sanhoury st.</span></p></td>
                        <td><p class="branch">Mohandessin<span class="address">-  Syria st., beside platinum mall.</span></p></td></tr>
                        <tr><td colspan="3" style="text-align: center;"><p class="branch">Obour<span class="address">
                            - 3rd Plot, 9th district, near to avenue cairo mall.<br>
                            - sonallah ibrahim st.</span></p></td></tr>
                        </table></article>
                    </div>
            </div>

            <a class="button" href="#smart"><img id="gym4" src="images/smartgym.png" alt="logo of smart gym"></a>
            <div id="smart" class="sponsorModal">
                <div class="modalContent">
                    <a href="#" class="closebtn">×</a>
                    <img id="gym4" src="images/smartgym.png" alt="logo of smart gym">
                    <article class="branches"><table>
                        <tr><td><p class="branch">Heliopolis<span class="address">
                            - 5 khaled ibn el walid, beside el seddik Mosque.<br>
                            - 13 el shaheed sayed afify st., off nabil el waqqad st., near to club aldo.<br>
                            - 8 el nour st., behind florida mall.<br>
                            - 4 maahad el sahary st., off el marghany st., beside baron hotel.</span></p></td>
                        <td><p class="branch">Nasr city<span class="address">
                                - 29 mohamed tawfiq diab st., off makkram ebaid st., near to total gas station.<br>
                                - 38 ezzat salama st., off abbas el akkad st.,beside gad restaurant.<br>
                                - 77A tiba bldgs el nasr st., floor 1 beside tiba mall.</span></p></td></tr>
                        <tr><td colspan="2" style="text-align: center;"><p class="branch">New cairo<span class="address">
                            - el tesaeen el ganouby st., porto new cairo, infront AUC.<br>
                            - route 53, first district, 7th zone, 5th compound, inside G out mall,2nd floor.</span></p></td></tr>
                        </table></article>
                </div>
            </div>
        </div>
    </section>
    <footer><img id="wave" src="images/wavee.png"></footer>
    <script>
         function openNav() {
            document.getElementById("links").style.width = "250px";
            document.getElementById("open").style.display= "none";
            }
    
            function closeNav() {
            document.getElementById("links").style.width = "0";
            document.getElementById("open").style.marginLeft= "0";
            document.getElementById("open").style.display= "block";
            }
        var healthyMarket =  document.getElementById("healthy");
        var gourmetMarket = document.getElementById("gourmet");
        var freshMarket = document.getElementById("fresh");
        var houseRest = document.getElementById("house");
        var caloriesRest = document.getElementById("calories");
        var delightRest = document.getElementById("delight");
        var goldGym = document.getElementById("gold");
        var h2oGym = document.getElementById("h2o");
        var smartGym = document.getElementById("smart");

        var exitspan = document.getElementsByClassName("exit");
        var sponsorModal = document.getElementsByClassName("sponsorModal");

        function market1() {
                healthyMarket.style.display='flex';
                gourmetMarket.style.display='none';
                freshMarket.style.display='none';
                houseRest.style.display='none'; 
                caloriesRest.style.display='none';
                delightRest.style.display='none';
                goldGym.style.display='none';
                h2oGym.style.display='none';
                smartGym.style.display='none';
            }
            function market2() {
                document.getElementById('healthy').style.display='none';
                document.getElementById('gourmet').style.display='block';
                document.getElementById('fresh').style.display='none';
                document.getElementById('house').style.display='none'; 
                document.getElementById('calories').style.display='none';
                document.getElementById('delight').style.display='none';
                document.getElementById('gold').style.display='none';
                document.getElementById('h2o').style.display='none';
                document.getElementById('smart').style.display='none';
            }
            function market3() {
                document.getElementById('healthy').style.display='none';
                document.getElementById('gourmet').style.display='none';
                document.getElementById('fresh').style.display='block';
                document.getElementById('house').style.display='none'; 
                document.getElementById('calories').style.display='none';
                document.getElementById('delight').style.display='none';
                document.getElementById('gold').style.display='none';
                document.getElementById('h2o').style.display='none';
                document.getElementById('smart').style.display='none';
            }
            function res1(){
                document.getElementById('healthy').style.display='none';
                document.getElementById('gourmet').style.display='none';
                document.getElementById('fresh').style.display='none';
                document.getElementById('house').style.display='block'; 
                document.getElementById('calories').style.display='none';
                document.getElementById('delight').style.display='none';
                document.getElementById('gold').style.display='none';
                document.getElementById('h2o').style.display='none';
                document.getElementById('smart').style.display='none';
            }
            function res2() {
                document.getElementById('healthy').style.display='none';
                document.getElementById('gourmet').style.display='none';
                document.getElementById('fresh').style.display='none';
                document.getElementById('house').style.display='none'; 
                document.getElementById('calories').style.display='block';
                document.getElementById('delight').style.display='none';
                document.getElementById('gold').style.display='none';
                document.getElementById('h2o').style.display='none';
                document.getElementById('smart').style.display='none';
            }
            function res3() {
                document.getElementById('healthy').style.display='none';
                document.getElementById('gourmet').style.display='none';
                document.getElementById('fresh').style.display='none';
                document.getElementById('house').style.display='none'; 
                document.getElementById('calories').style.display='none';
                document.getElementById('delight').style.display='block';
                document.getElementById('gold').style.display='none';
                document.getElementById('h2o').style.display='none';
                document.getElementById('smart').style.display='none';
            }
            function gym1() {
                document.getElementById('healthy').style.display='none';
                document.getElementById('gourmet').style.display='none';
                document.getElementById('fresh').style.display='none';

    document.getElementById('house').style.display='none'; 
                document.getElementById('calories').style.display='none';
                document.getElementById('delight').style.display='none';
                document.getElementById('gold').style.display='block';
                document.getElementById('h2o').style.display='none';
                document.getElementById('smart').style.display='none';
            }
            function gym2() {
                document.getElementById('healthy').style.display='none';
                document.getElementById('gourmet').style.display='none';
                document.getElementById('fresh').style.display='none';
                document.getElementById('house').style.display='none'; 
                document.getElementById('calories').style.display='none';
                document.getElementById('delight').style.display='none';
                document.getElementById('gold').style.display='none';
                document.getElementById('h2o').style.display='block';
                document.getElementById('smart').style.display='none';
            }
            function gym3() {
                document.getElementById('healthy').style.display='none';
                document.getElementById('gourmet').style.display='none';
                document.getElementById('fresh').style.display='none';
                document.getElementById('house').style.display='none'; 
                document.getElementById('calories').style.display='none';
                document.getElementById('delight').style.display='none';
                document.getElementById('gold').style.display='none';
                document.getElementById('h2o').style.display='none';
                document.getElementById('smart').style.display='block';
            }
    </script>
</body>
</html>
