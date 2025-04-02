<?php
require_once('includes/connect.php');

// Modified query to fetch only one image per project (e.g., the cover image)
$projectQuery = 'SELECT p.project_id, m.file_url, p.project_title, p.project_description 
                 FROM projects p 
                 JOIN media m ON p.project_id = m.project_id 
                 WHERE m.media_id = (
                     SELECT MIN(media_id) 
                     FROM media 
                     WHERE project_id = p.project_id
                 )';
$stmt = $connection->prepare($projectQuery);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
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
                    <a href="index.php"><img src="img/logo.svg" alt="Logo"></a>
                </div>

                <ul class="mobile-nav" id="mobileNav">
                    <li>
                        <div id="mobileNavCloseBtn"><img src="img/close.svg" alt="Close Menu"></div>
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
                            <img src="img/burger.svg" alt="Menu">
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="grid-con title">
        <p id="project-title-des" class="m-col-span-full col-span-full">
            UI Design
        </p>
        <h2>Website</h2>
    </div>

    <section id="bg-black2">
        <div class="grid-con">
            <?php
            if ($stmt->rowCount() > 0) {
                $index = 0;
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
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Use modulo to cycle through classes array
                    $classIndex = $index % count($classes);
                    echo '<div class="card ' . $classes[$classIndex] . '">
                        <a href="casestudy.php?project_id=' . $row['project_id'] . '">
                            <img src="./img' . htmlspecialchars($row['file_url']) . '" alt="' . htmlspecialchars($row['project_title']) . '">
                            <p>
                                <span class="bold">' . htmlspecialchars($row['project_title']) . '</span> - ' . htmlspecialchars($row['project_description']) . '
                            </p>
                        </a>
                    </div>';
                    $index++;
                }
            } else {
                echo '<p>No projects found.</p>';
            }
            ?>
        </div>
    </section>

    <footer>
        <video class="footer-vid" autoplay loop muted playsinline>
            <source src="img/footer-bg.mp4" type="video/mp4">
        </video>
        <div class="footer-con">
            <h2>Have <br><span>an idea?</span></h2>
            <a href="contact.php">
                <button class="tell">Tell Me</button>
            </a>
            <div class="contact">
                <button id="btn-1">polchai.napas@gmail.com</button>
                <button id="btn-2">+1 (416) 302 6763</button>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/video.js"></script>
    <script src="js/scroll.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@latest/bundled/lenis.min.js"></script>
    <script>
        const lenis = new Lenis();
        lenis.on('scroll', (e) => {
            console.log(e);
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>