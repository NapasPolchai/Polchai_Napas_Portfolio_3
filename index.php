<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');



$projectQuery = "SELECT p.project_id, m.file_url, p.project_title, p.project_description FROM projects p JOIN media m ON p.project_id = m.project_id LIMIT 6";
$stmt = $connect->prepare("SELECT p.project_id, m.file_url, p.project_title, p.project_description FROM projects p JOIN media m ON p.project_id = m.project_id LIMIT 6");
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>napas</title>
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

    <main>
        <section class="grid-con hero">
            <h1 class="hidden">This is my portfolio</h1>

            <div id="hero-text1" class="l-col-start-1 l-col-end-7 col-span-full">
                <h2>Web <span>Designer</span></h2>
            </div>

            <div id="reel" class="col-start-1 col-end-3 m-col-start-1 m-col-span-4 l-col-start-1 l-col-span-3">
                <img src="img/reel:.gif" alt="">
            </div>

            <div id="hero-text2" class="l-col-start-4 l-col-end-9 m-col-start-5 m-col-span-4 col-start-3 col-end-5">
                <h2>with a</h2>
            </div>

            <div id="hero-text3" class="xl-col-start-1 xl-col-end-9 l-col-start-1 l-col-end-9 col-span-full">
                <h2>Graphic <span>Design</span> Edge</h2>
            </div>

            <!-- <div class="hero-text col-span-full">
                <h1>Web <span>Designer</span>
                    <br> <img src="img/reel:.gif" alt="" id="reel">with a <br>
                    Graphic <span>Design</span> Edge
                </h1>
            </div> -->
        </section>

        <div class="grid-con">
            <section id="player-container" class="col-span-full">
                <video controls preload="metadata" poster="images/placeholder.jpg">
                    <source src="video/Napas_Polchai_Demoreel.webm" type="video/webm">
                    <p>Your browser does not support the video tag.</p>
                </video>
                <div class="video-controls hidden" id="video-controls">
                    <button id="play-button"><i class="fa fa-play-circle-o"></i></button>
                    <button id="pause-button"><i class="fa fa-pause-circle-o"></i></button>
                    <button id="stop-button"><i class="fa fa-stop-circle-o"></i></button>
                    <i class="fa fa-volume-up"></i>
                    <input type="range" id="change-vol" step="0.05" min="0" max="1" value="1">
                    <button id="full-screen"><i class="fa fa-arrows-alt"></i></button>
                </div>
            </section>
        </div>

        <section class="grid-con" id="about">
            <div id="memoji" class="l-col-start-2 l-col-end-6 m-col-start-2 m-col-end-6 hidden">
                <img src="img/memoji.png" alt="">
            </div>

            <div id="about-text" class="l-col-start-6 l-col-end-13  m-col-start-6 m-col-end-13 col-span-full">

                <div id="status-bar">
                    <div id="status-indicator"></div>
                    <div id="status-text">Available</div>
                </div>

                <h2>
                    From Nonthaburi, Thailand. Former Graphic <span>Designer </span>and Photographer turned to Web
                    <span>Designer </span>, with a
                    love for <span> design</span>. Wherever it is, I’d rather be on wheels.
                </h2>
            </div>
        </section>


        <section id="bg-black-1">
            <div class="grid-con">
                <div class="col-span-full l-col-start-1 l-col-span-8 m-col-start-1 m-col-span-8 skills" id="skill-1">
                    <div class="ui-img-1">
                        <img src="img/landing-desktop/THA MOCK2.png" alt="">
                    </div>
                    <p>
                        <span class="bold"> Ui / UX Design - </span> 4 years of experience as a UI / UX designer. I
                        worked with many types of clients
                        such as hospitals, Interior design companies, Jewelry brands, and Insurance companies.
                    </p>
                </div>

                <div class="col-span-full l-col-start-9 l-col-span-4 m-col-start-9 m-col-span-4 skills" id="skill-2">
                    <div class="ui-img-1">
                        <img src="img/landing-desktop/SWU.png" alt="">
                    </div>
                    <p>
                        <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a graphic
                        designer.
                    </p>
                </div>

                <div class="col-span-full fea-head">
                    <h2><span class="colour">Featured</span><br><span class="move">projects</span></h2>
                </div>

                <?php
                if ($stmt->rowCount() > 0) {
                    $index = 0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $classes = [
                            'col-span-full l-col-start-1 l-col-span-8 m-col-start-1 m-col-span-8',
                            'col-span-full l-col-start-9 l-col-span-4 m-col-start-9 m-col-span-4',
                            'col-span-full l-col-start-1 l-col-end-7 m-col-start-1 m-col-span-6',
                            'col-span-full l-col-start-7 l-col-end-13 m-col-start-7 m-col-span-6',
                            'col-span-full l-col-start-1 l-col-end-5 m-col-start-1 m-col-span-5',
                            'col-span-full l-col-start-5 l-col-end-13 m-col-start-6 m-col-span-7',
                        ];
                        echo '<div class="card '.$classes[$index].'">
                            <a href="casestudy.php?project_id='.$row['project_id'].'">
                                <img src="./img'.$row['file_url'].'" alt="">
                                <p>
                                    <span class="bold">'. $row['project_title'] .'</span> - '.$row['project_description'].'
                                </p>
                            </a>
                        </div>';
                        $index += 1;
                    }
                }
                ?>

                <!-- <div class="card col-span-full l-col-start-1 l-col-span-8 m-col-start-1 m-col-span-8">
                    <a href="casestudy.html">
                        <img src="img/landing-desktop/Welter-SEA.png" alt="">
                        <p>
                            <span class="bold">Ui / UX Design</span> - 4 years of experience as a UI / UX
                            designer. I worked with many types of clients such as hospitals, Interior design companies,
                            Jewelry brands, and Insurance companies.
                        </p>
                    </a>

                </div> -->

                <!-- <div class="card col-span-full l-col-start-1 l-col-span-8 m-col-start-1 m-col-span-8">
                    <a href="casestudy.html">
                        <img src="img/landing-desktop/Welter-SEA.png" alt="">
                        <p>
                            <span class="bold">Ui / UX Design</span> - 4 years of experience as a UI / UX
                            designer. I worked with many types of clients such as hospitals, Interior design companies,
                            Jewelry brands, and Insurance companies.
                        </p>
                    </a>

                </div>

                <div class="card col-span-full l-col-start-9 l-col-span-4 m-col-start-9 m-col-span-4">
                    <a href="casestudy.html">
                        <img src="img/landing-desktop/NPD-project.png" alt="">
                        <p>
                            <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a
                            graphic
                            designer.
                        </p>
                    </a>
                </div>

                <div class="card  l-col-start-1 l-col-end-7 m-col-start-1 m-col-span-6 col-span-full">
                    <a href="casestudy.html">
                        <img src="img/landing-desktop/MEDPARK.png" alt="">
                        <p>
                            <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a
                            graphic
                            designer.
                        </p>
                    </a>
                </div>

                <div class="card l-col-start-7 l-col-end-13 m-col-start-7 m-col-span-6 col-span-full">
                    <a href="casestudy.html">
                        <img src="img/landing-desktop/SKY.png" alt="">
                        <p>
                            <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a
                            graphic
                            designer.
                        </p>
                    </a>
                </div>

                <div class="card l-col-start-1 l-col-end-5 m-col-start-1 m-col-span-5 col-span-full">
                    <a href="casestudy.html">
                        <img src="img/landing-desktop/Logo-ShopSabuy.png" alt="">
                        <p>
                            <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a
                            graphic
                            designer.
                        </p>
                    </a>

                </div> -->

                <!-- <div class="card l-col-start-5 l-col-end-13 m-col-start-6 m-col-span-7 col-span-full">
                    <a href="casestudy.html">
                        <img src="img/landing-desktop/SLI.png" alt="">
                        <p>
                            <span class="bold">Ui / UX Design</span> - 4 years of experience as a UI / UX
                            designer. I worked with many types of clients such as hospitals, Interior design companies,
                            Jewelry brands, and Insurance companies.
                        </p>
                    </a>

                </div> -->
            </div>
        </section>

        <section class="prof-skill">
            <div class="grid-con">
                <div class="col-span-full l-col-start-1 l-col-span-5 m-col-start-1 m-col-span-5 prof-text">
                    <div class="text">
                        <p class="spesh-p">EMPOWERING <br class="hide-desk">THROUGH EXPERTISE</p>
                        <h2><span>Professional Skills</span> and <span>Empathy</span></h2>
                        <p>
                            With four years of experience as a graphic designer before transitioning to UI design, I
                            bring a strong foundation in creativity and design. My passion for art drives me to create
                            user-focused, visually appealing solutions. Empathy guides my process, ensuring I understand
                            and address user needs effectively.
                        </p>
                    </div>
                </div>

                <img class="l-col-start-7 l-col-span-6 m-col-start-7 m-col-span-6 hide-mob"
                    src="img/place-holder-img-3.png" alt="">
            </div>
            <img class="hide-desk" src="img/place-holder-img-3.png" alt="">
        </section>


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
    </main>
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