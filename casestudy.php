<?php
require_once('includes/connect.php');

// Fetch case study data
$query = "SELECT p.project_id, GROUP_CONCAT(m.file_url) AS images, p.project_title, p.project_description, client_url, image, description 
          FROM projects p 
          JOIN media m ON m.project_id = p.project_id 
          JOIN case_studies ON case_studies.case_id = p.project_id 
          WHERE p.project_id = :projectid 
          GROUP BY p.project_id, p.project_title, p.project_description, client_url, image, description 
          LIMIT 6";
$stmt = $connection->prepare($query);

$projectid = $_GET['project_id'];
$stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt = null;

// Check if data exists and prepare image array
if ($row) {
    $image_array = explode(',', $row['images']);
} else {
    $image_array = []; // Fallback if no images found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Case Studies - <?php echo htmlspecialchars($row['project_title'] ?? ''); ?></title>
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

    <?php if ($row): ?>
        <div class="grid-con" id="case-title">
            <h2 class="col-span-full m-col-span-full"><?php echo htmlspecialchars($row['project_title']); ?></h2>
            <p id="case-title-des" class="col-span-full m-col-span-full"><?php echo htmlspecialchars($row['client_url']); ?></p>
        </div>

        <img src="img/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['project_title']); ?>" id="case-hero-img">

        <section id="case-text" class="grid-con">
            <p id="case-head" class="l-col-start-1 l-col-end-4 m-col-start-1 m-col-end-4 xl-col-start-1 xl-col-end-4 col-span-full">
                The Challenge
            </p>
            <p id="case-des" class="l-col-start-5 l-col-end-13 m-col-start-5 m-col-end-13 xl-col-start-5 xl-col-end-13 col-span-full case-des">
                <?php echo htmlspecialchars($row['description']); ?>
            </p>
        </section>

        <section id="gallery" class="grid-con">
        <?php
// Start from index 1 to skip the cover image
for ($i = 1; $i < count($image_array); $i++) {
    $image_path = trim($image_array[$i]); // Remove any whitespace
    
    // Assign classes based on the image position
    if ($i === 1) {
        // First image (e.g., wide)
        $classes = 'gallery-img l-col-start-1 l-col-end-9 m-col-start-1 m-col-end-9 xl-col-start-1 xl-col-end-9 col-span-full';
    } elseif ($i === 2) {
        // Second image (e.g., medium)
        $classes = 'gallery-img l-col-start-9 l-col-end-13 m-col-start-9 m-col-end-13 xl-col-start-9 xl-col-end-13 col-span-full';
    } elseif ($i === 3) {
        // Third image (e.g., narrow)
        $classes = 'gallery-img l-col-start-1 l-col-end-13 m-col-start-1 m-col-end-13 xl-col-start-1 xl-col-end-13 col-span-full';
    } else {
        // Default for additional images (optional, e.g., repeat the first style)
        $classes = 'gallery-img l-col-start-1 l-col-end-7 m-col-start-1 m-col-end-7 xl-col-start-1 xl-col-end-7 col-span-full';
    }
    
    // Output the image with dynamic classes
    echo '<img src="img' . htmlspecialchars($image_path) . '" alt="Project screenshot" class="' . $classes . '">';
}
?>
</section>
    <?php else: ?>
        <div class="grid-con">
            <p class="col-span-full">No case study found for this project.</p>
        </div>
    <?php endif; ?>

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