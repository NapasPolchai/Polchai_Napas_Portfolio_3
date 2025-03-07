<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');



$projectQuery = 'SELECT p.project_id, m.file_url, p.project_title, p.project_description FROM projects p JOIN media m ON p.project_id = m.project_id';
$stmt = $connection->prepare('SELECT p.project_id, m.file_url, p.project_title, p.project_description FROM projects p JOIN media m ON p.project_id = m.project_id');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Projects</title>
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

    <div class="grid-con title">
        <p id="project-title-des" class="m-col-span-full col-span-full">
            Ui design
        </p>

        <h2>
            Website
        </h2>
    </div>

    

    <section id="bg-black2">

<div class="grid-con">
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
                            'col-span-full l-col-start-1 l-col-span-8 m-col-start-1 m-col-span-8',
                            'col-span-full l-col-start-9 l-col-span-4 m-col-start-9 m-col-span-4',
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
        <!-- <div class="grid-con">
            <div class="col-span-full l-col-start-1 l-col-span-8 m-col-start-1 m-col-span-8 card" id="card-lapse">
                <a href="casestudy.html">
                    <img src="img/landing-desktop/Welter-SEA.png" alt="">
                    <p>
                        <span class="bold">Ui / UX Design</span> - 4 years of experience as a UI / UX
                        designer. I worked with many types of clients such as hospitals, Interior design companies,
                        Jewelry brands, and Insurance companies.
                    </p>
                </a>

            </div>

            <div class="col-span-full l-col-start-9 l-col-span-4 m-col-start-9 m-col-span-4 card">
                <a href="casestudy.html">
                    <img src="img/landing-desktop/NPD-project.png" alt="">
                    <p>
                        <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a graphic
                        designer.
                    </p>
                </a>

            </div>

            <div
                class="xl-col-start-1 xl-col-end-7 l-col-start-1 l-col-end-7 m-col-start-1 m-col-end-7 col-span-full card ">
                <a href="casestudy.html">
                    <img src="img/landing-desktop/MEDPARK.png" alt="">
                    <p>
                        <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a graphic
                        designer.
                    </p>
                </a>

            </div>

            <div
                class="xl-col-start-7 xl-col-end-13 l-col-start-7 l-col-end-13 m-col-start-7 m-col-end-13 col-span-full card">
                <a href="casestudy.html">
                    <img src="img/landing-desktop/SKY.png" alt="">
                    <p>
                        <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a graphic
                        designer.
                    </p>
                </a>

            </div>

            <div
                class="xl-col-start-1 xl-col-end-5 l-col-start-1 l-col-end-5 m-col-start-1 m-col-end-5 col-span-full card">
                <a href="casestudy.html">
                    <img src="img/landing-desktop/Logo-ShopSabuy.png" alt="">
                    <p>
                        <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a graphic
                        designer.
                    </p>
                </a>

            </div>

            <div
                class="xl-col-start-5 xl-col-end-13 l-col-start-5 l-col-end-13 m-col-start-5 m-col-end-13 col-span-full card">
                <a href="casestudy.html">
                    <img src="img/landing-desktop/SLI.png" alt="">
                    <p>
                        <span class="bold">Ui / UX Design</span> - 4 years of experience as a UI / UX
                        designer. I worked with many types of clients such as hospitals, Interior design companies,
                        Jewelry brands, and Insurance companies.
                    </p>
                </a>

            </div>

            <div class="col-span-full l-col-start-1 l-col-span-8 m-col-start-1 m-col-span-8 card">
                <a href="casestudy.html">
                    <img src="img/landing-desktop/Welter-SEA.png" alt="">
                    <p>
                        <span class="bold">Ui / UX Design</span> - 4 years of experience as a UI / UX
                        designer. I worked with many types of clients such as hospitals, Interior design companies,
                        Jewelry brands, and Insurance companies.
                    </p>
                </a>

            </div>

            <div class="col-span-full l-col-start-9 l-col-span-4 m-col-start-9 m-col-span-4 card">
                <a href="casestudy.html">
                    <img src="img/landing-desktop/NPD-project.png" alt="">
                    <p>
                        <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a graphic
                        designer.
                    </p>
                </a>

            </div>
        </div> -->
</div>
    
    <!-- </section>

    <div class="grid-con title2">
        <p id="project-title-des-2" class="col-span-full m-col-span-full">
            Graphic design
        </p>

        <h2>
            Graphic
        </h2>
    </div>

    <section class="grid-con"> -->


   
        <!-- <div class="col-span-full l-col-start-1 l-col-span-8 m-col-start-1 m-col-span-8 card2">
            <a href="casestudy.html">
                <img src="img/Welter-SEA-full.png" alt="">
                <p>
                    <span class="bold">Ui / UX Design</span> - 4 years of experience as a UI / UX
                    designer. I worked with many types of clients such as hospitals, Interior design companies,
                    Jewelry brands, and Insurance companies.
                </p>
            </a>

        </div>

        <div class="col-span-full l-col-start-9 l-col-span-4 m-col-start-9 m-col-span-4 card2">
            <a href="casestudy.html">
                <img src="img/Welter-SEA-full.png" alt="">
                <p>
                    <span class="bold">Graphic Design - </span> Specializing in Illustration, then became a graphic
                    designer.
                </p>
            </a>

        </div>

        <div
            class="col-span-full l-col-start-1 l-col-end-13 xl-col-start-1 xl-col-end-13 m-col-start-1 m-col-end-13 card2">
            <a href="casestudy.html">
                <img src="img/NPD-full.png" alt="">
                <p>
                    <span class="bold">Ui / UX Design</span> - 4 years of experience as a UI / UX
                    designer. I worked with many types of clients such as hospitals, Interior design companies,
                    Jewelry brands, and Insurance companies.
                </p>
            </a>

        </div> -->
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