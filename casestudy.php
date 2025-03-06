<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Case Studies</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head><!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');


$query = "SELECT p.project_id, m.file_url, p.project_title, p.project_description, client_url, image, description FROM projects p JOIN media m JOIN case_studies ON case_studies.case_id = p.project_id WHERE p.project_id = :projectid LIMIT 6";
$stmt = $connect->prepare($query);

$projectid = $_GET['project_id'];

$stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

?>


<body>
    <header>
        <div class="header-container grid-con">
            <nav class="nav-menu col-span-full">
                <div class="logo">
                    <a href="index.php"><img src="img/logo.svg" alt=""></a>
                </div>

                <ul class="mobile-nav" id="mobileNav">
                    <li>
                        <div id="mobileNavCloseBtn"><img src="img/close.svg" alt="">
                        </div>
                    </li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="experiences.php">Experience</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>

                <ul>
                    <li class="hide-on-mobile"><a href="projects.php">Projects</a></li>
                    <li class="hide-on-mobile"><a href="experiences.php">Experience</a></li>
                    <li class="hide-on-mobile"><a href="contact.php">Contact</a></li>
                    <li class="mobile-toggle">
                        <div id="hamburgerBtn">
                            <img src="img/burger.svg" alt="">
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
<?php 
    echo '
    <div class="grid-con" id="case-title">
        <h2 class="col-span-full m-col-span-full">
            '.$row ['project_title'].'
        </h2>

        <p id="case-title-des" class="col-span-full m-col-span-full">
            '.$row ['client_url'].'
        </p>
    </div>

    <img src="img/'.$row ['image'].'" alt="" id="case-hero-img">

    <section id="case-text" class="grid-con">
        <p id="case-head"
            class="l-col-start-1 l-col-end-4 m-col-start-1 m-col-end-4 xl-col-start-1 xl-col-end-4 col-span-full">
            The Challenge
        </p>

        <p id="case-des"
            class="l-col-start-5 l-col-end-13 m-col-start-5 m-col-end-13 xl-col-start-5 xl-col-end-13 col-span-full case-des">
            '.$row ['description'].'
        </p>

    </section>

    <section id="gallery" class="grid-con">
    <img src="img/'.$row ['image'].'" alt="" class="gallery-img l-col-start-1 l-col-end-9 m-col-start-1 m-col-end-9 xl-col-start-1 xl-col-end-9 col-span-full">
    <img src="img/'.$row ['image'].'" alt="" class="gallery-img l-col-start-9 l-col-end-13 m-col-start-9 m-col-end-13 xl-col-start-9 xl-col-end-13 col-span-full">
    <img src="img/'.$row ['image'].'" alt="" class="gallery-img l-col-start-1 l-col-end-13 m-col-start-1 m-col-end-13 xl-col-start-1 xl-col-end-13 col-span-full">
        
        
    </section>';
    ?>

    <footer>
            <video class="footer-vid" autoplay loop muted playsinline>
                <source src="img/footer-bg.mp4" type="video/mp4">
            </video>
            <div class="footer-con">
                <h2>Have <br><span>an idea?</span> </h2>
                <a href="contact.php">
                    <button class="tell">Tell Me</button>
                </a>
                

                <div class="contact">
                    <button id="btn-1">polchai.napas@gmail.com</button>
                    <button id="btn-2">+1 (416) 302 6763</button>
                </div>
            </div>
        </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="js/main.js"></script>
<script src="js/video.js"></script>
<script src="js/scroll.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@latest/bundled/lenis.min.js"></script>
    <script>
        const lenis = new Lenis()
        lenis.on('scroll', (e) => {
            console.log(e)
        })

        function raf(time) {
            lenis.raf(time)
            requestAnimationFrame(raf)
        }
        requestAnimationFrame(raf)
    </script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</html>