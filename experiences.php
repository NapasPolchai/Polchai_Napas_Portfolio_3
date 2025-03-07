<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Experiences</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head><!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');



$projectQuery = "SELECT p.project_id, m.file_url, p.project_title, p.project_description FROM projects p JOIN media m ON p.project_id = m.project_id LIMIT 6";
$stmt = $connection->prepare("SELECT p.project_id, m.file_url, p.project_title, p.project_description FROM projects p JOIN media m ON p.project_id = m.project_id LIMIT 6");
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Experiences</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>

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

    <section class="grid-con">
        <div class="experiences-title col-span-full m-col-span-full">
            <h1>Crafting <span><br>Design</span>
                <br class="hide-desk">journeys
            </h1>
        </div>
    </section>

    <div class="grid-con">
        <p id="title-des" class="col-span-full m-col-span-full">
            4 years of experiences
        </p>
    </div>


    <section class="grid-con experience-card">
        <div class="experience-1  col-span-full m-col-span-full">
            <h2>Gorilla co.</h2>
            <p>
                Started in a Junior graphic designer role in an Event organizing company that works on car events such
                as Nissan.
                I designed the small scale up to the big scale.
            </p>
        </div>
        <div class="underline col-span-full m-col-span-full"></div>
        <div class="experience-1 col-span-full m-col-span-full">
            <h2>Anotter co..</h2>
            <p>
                The first place I became a User Interface designer. This company also had me as a partner. We design
                both websites and applications for many types of clients.
            </p>
        </div>
        <div class="underline col-span-full m-col-span-full"></div>
        <div class="experience-1 col-span-full m-col-span-full">
            <h2>Phoenix</h2>
            <p>
                This company does both website and marketing made me work with varieties of designs cause they have many
                groups of clients including International clients.
            </p>
        </div>
        <div class="underline col-span-full m-col-span-full"></div>
        <div class="experience-1 col-span-full m-col-span-full">
            <h2>Pimclick</h2>
            <p>
                Pimclick is a digital marketing company that focuses on website design and development. I had to work
                with a team, which taught me teamwork skills.
            </p>
        </div>
        <div class="underline col-span-full m-col-span-full"></div>
        <div class="add-your-company col-span-full m-col-span-full">
            <h2>add your company +</h2>
        </div>
    </section>

    <section class="grid-con">
        <div id="num1" class="l-col-start-1 l-col-end-4 col-span-full m-col-start-1 m-col-end-4 num1">
            <h2>
                30+
            </h2>
            <p>Completed projects</p>
        </div>

        <div id="num1" class="l-col-start-4 l-col-end-7 col-span-full m-col-start-4 m-col-end-7 num2">
            <h2>
                20+
            </h2>
            <p>trusted Clients</p>
        </div>
        
        <div id="num1" class="l-col-start-7 l-col-end-12 col-span-full m-col-start-7 m-col-end-12 num3">
            <h2>
                4 years
            </h2>
            <p>of experiences</p>
        </div>
    </section>

    <img src="img/NPD-full.png" alt="" id="middle-img">

    <!-- <section class="grid-con clients">
        <h2 class="col-span-full m-col-span-full">Trusted by</h2>
        <div id="clients-logo" class="box l-col-start-1 l-col-end-4 xl-col-start-1 xl-col-end-4"></div>
        <div id="clients-logo" class="box l-col-start-4 l-col-end-7 xl-col-start-4 xl-col-end-7"></div>
        <div id="clients-logo" class="box l-col-start-7 l-col-end-10 xl-col-start-7 xl-col-end-10"></div>
        <div id="clients-logo" class="box l-col-start-10 l-col-end-13 xl-col-start-10 xl-col-end-13"></div>
        <div id="clients-logo" class="box l-col-start-1 l-col-end-4 xl-col-start-1 xl-col-end-4"></div>
        <div id="clients-logo" class="box l-col-start-4 l-col-end-7 xl-col-start-4 xl-col-end-7"></div>
        <div id="clients-logo" class="box l-col-start-7 l-col-end-10 xl-col-start-7 xl-col-end-10"></div>
        <div id="clients-logo" class="box l-col-start-10 l-col-end-13 xl-col-start-10 xl-col-end-13"></div>
    </section> -->

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