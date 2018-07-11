<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    
    <?php $name = 'JWD'; ?>

    <meta charset="utf-8">
    <title><?php echo($name) ?> Styleguide</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
    <!-- Based on and inspired by Pattern Primer: https://github.com/adactio/Pattern-Primer -->
    
    <link rel="stylesheet" href="../dest/css/styleguide.css">
    <script src="../dest/js/bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" async="async"></script>
    <!-- Code highlighter -->

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/androidstudio.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body>
    
    <div class="title">
        <h1><?php echo($name) ?> Styleguide</h1>        
    </div>


    <div class="body-container">

        <div class="styleguide-wrapper">

            <?php
                $files = array();
                $handle=opendir('patterns');
                while (false !== ($file = readdir($handle))):
                    if(substr($file, -5) == '.html'):
                        $files[] = $file;
                    endif;
                endwhile;
                sort($files);

                echo '<aside class="table-of-contents toc-notscrolled">';
                    echo '<strong>Table of contents:</strong>';
                    echo '<ul class="toc-list">';
                    foreach ($files as $file):
                        $headline = substr($file, 3, -5);
                        echo '<li class="toc-list-entry"><a href="#' . $file . '">' . ucfirst($headline) . '</a></li>';
                    endforeach;
                    echo '</ul>';
                echo '</aside>';
                
                echo '<div class="patterns">';
                foreach ($files as $file):
                    echo '<section class="pattern" id="' . $file . '">';

                    $headline = substr($file, 3, -5);

                    echo '<h2 class="pattern-title">' . ucfirst($headline) . '</h2>';

                    echo '<div class="display">';
                    include('patterns/'.$file);
                    echo '</div>';
                    echo '<div class="source">';
                    echo '<pre>';
                    echo '<code class="html">';
                    echo htmlspecialchars(file_get_contents('patterns/'.$file));
                    echo '</code>';
                    echo '</pre>';
                    echo '<p><a class="btn btn-border" href="patterns/'.$file.'">'.$file.' <i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>';
                    echo '</div>';
                    echo '</section>';
                endforeach;
                echo '</div>';
            ?>

        </div>

    </div>
    
    <script type="text/javascript">
            
            $(window).scroll(function(){ 
                
                var scrollDepth = 128;
                var position = $(window).scrollTop();
                var header = $('.table-of-contents');

                if(position > scrollDepth) {
                    header.addClass('toc-scrolled');
                    header.removeClass('toc-notscrolled');
                }
                else { 
                    header.addClass('toc-notscrolled');
                    header.removeClass('toc-scrolled'); 
                }
            });
            
        </script>

</body>
</html>
