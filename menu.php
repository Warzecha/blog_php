<?php
    
    echo "<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>Blog</title>
    
    
    <link rel=\"alternate stylesheet\" href=\"default.css\" type=\"text/css\" />
    <link rel=\"alternate stylesheet\" href=\"dark.css\" type=\"text/css\" />
    <link id=\"pagestyle\" href=\"default.css\" rel=\"stylesheet\" type=\"text/css\"/>
    
    <script type=\"text/javascript\" src=\"script.js\"></script>
    <script src=\"https://code.jquery.com/jquery-3.3.1.min.js\"></script>
    </head>";
    
    echo "<body >";
    echo "<a href='create_blog_form.php'><button>New blog</button></a>";
	echo "<a href='create_post_form.php'><button>Add post to your blog</button></a>";
    echo "<a href='blog.php'><button>Discover blogs</button></a>";
    echo "<a href='chat.php'><button>Chat</button></a>";

    echo "<ul id=\"styles\">


    </ul>
    ";
    

?>