

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="png" href="https://img.icons8.com/fluency/48/facebook-new.png"> -->
    <title>Profile</title>
    <link rel="stylesheet" href="./CSS/profilepage.css">
    <link rel="stylesheet" href="./CSS/mainpage.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav>
        <div class="fb-search">
            <div class="logo" onclick="toggleRefresh()">
                <!-- <img src="./Assets/Facebook-Logo.png" alt=""> -->
                <img width="48" height="48" src="https://img.icons8.com/fluency/48/facebook-new.png" alt="facebook-new" />
            </div>
            <div class="search-bar">
                <form action="">
                    <input type="text" placeholder="Search">
                    <i class='bx bx-search-alt-2'></i>
                </form>
            </div>
        </div>
        <div class="fb-content">
            <a href="mainpage.php" id="myLink">
                <div class="FBC fbchome">
                    <i class='bx bx-home-alt' id="homeIcon"></i>
                </div>
            </a>
            <a href="friendsList.php">
                <div class="FBC friends">
                    <i class='bx bx-group' id="friendsIcon"></i>
                </div>
            </a>
            <div class="FBC market">
                <i class='bx bx-store-alt' id="marketIcon"></i>
            </div>
            <div class="FBC groups">
                <i class='bx bx-user-circle' id="groupsIcon"></i>
            </div>
            <div class="FBC games">
                <i class="fa-solid fa-gamepad" id="gamesIcon"></i>
            </div>
        </div>
        <!-- <div class="fb-menu">
            <div class="FBM" id="postContent" onclick="goToMainPage()">
                <i class="fa-solid fa-plus"></i>
            </div>
            <div class="FBM">
                <i class="fa-brands fa-facebook-messenger"></i>
            </div>
            <div class="FBM">
                <i class="fa-solid fa-bell"></i> -->
            </div>
            <div class="FBM user_Profile" onclick="openUserProfileMenu()">
                <img src="" alt="Profile">
                <div class="UP-drpdwn">
                    <i class="fa-solid fa-angle-down"></i>
                </div>
            </div>
            <div class="UP-menu_container" id="UPmc">
                <div class="upmc">
                    <div class="upmc_Upper">
                        <div class="upmcU _settings">
                            <div class="upmcU_right">
                                <i class="fa-solid fa-gear changeColor"></i>
                            </div>
                            <div class="upmcU_left">Settings & privacy</div>
                        </div>
                        <div class="upmcU _helpSupport">
                            <div class="upmcU_right">
                                <i class='bx bxs-help-circle'></i>
                            </div>
                            <div class="upmcU_left">Help & support</div>
                        </div>
                        <div class="upmcU _giveFeedback">
                            <div class="upmcU_right">
                                <i class='bx bxs-comment-error'></i>
                            </div>
                            <div class="upmcU_left">Give Feedback</div>
                        </div>
                        <a href="logout.php" class="upmcU" id="logout">
                            <div class="upmcU_right">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </div>
                            <div class="upmcU_left">Log Out</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="junalisa">
        <div class="section_header">
            <div class="SH sh_1">
                <img src="./Assets/04.jpg" alt="Cover Photo">
                <div class="addCoverPhoto">
                    <i class='bx bxs-camera'></i>
                    Edit cover photo
                </div>
            </div>
            <div class="SH sh_2">
                <div class="sh_ProfileCont">
                    <img id="profilePicture" src="" alt="Profile Picture">
                </div>
                <div class="sh2_camera" id="cameraIcon">
                    <i class='bx bxs-camera'></i>
                    <input type="file" id="profilePictureInput" style="display: none;">
                </div>
                <div class="sh2_cont">
                    <div class="sh2a">
                        <p class="sh2a_Username"></p>
                        <p class="follow_count">2</p>
                    </div>
                    <div class="sh2b">
                        <div class="sh2b_options">
                            
                            <div class="sh2bo_1 sh2boH">
                                <i class="fa-solid fa-pen"></i>
                                Edit profile
                            </div>
                            <div class="sh2bo_2 sh2boH">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="SH sh_3">
                <div class="sh3_Cont">
                    <div class="sh3C_left">
                        <div class="sch3CL">Posts</div>
                        <div class="sch3CL">About</div>
                        <div class="sch3CL">Friends</div>
                        <div class="sch3CL">Photos</div>
                        <div class="sch3CL">Videos</div>
                        <div class="sch3CL">Reels</div>
                        <div class="sch3CL">
                            More
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="sh3C_right">
                        <div class="sch3CR">
                            <i class="fa-solid fa-ellipsis"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section_body">
             <div class="users_Posts">
                                <!-- <div class="usrsP_1">
                                    <div class="usrsp1left">
                                        <div class="usrsp1left_01">
                                            <img src="${value.content.profile_picture}" alt="Profile">
                                        </div>
                                        <div class="usrsp1left_02">
                                            <p>${value.content.firstname} ${value.content.lastname}</p>
                                            <span>${value.content.created_at} &#183; <i class='fa-solid fa-user-group'></i></span>
                                        </div>
                                    </div>
                                    <div class="usrsp1right">
                                        <div class="usrsp1right_icon">
                                            <i class="fa-solid fa-ellipsis"></i>
                                            <div class="usrsp_options">
                                                <p class="edit-btn" data-post-id="${value.content.post_id}">Edit</p>
                                                <p class="delete-btn" data-post-id="${value.content.post_id}">Delete</p>
                                            </div>
                                            <div class="triangle"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="usrsP_caption">
                                    <p>${value.content.caption}</p>
                                </div>
                                <div class="usrsP_imagePosted post-images-wrapper">
                                    <button class="nav-btn left-btn">←</button>
                                    <div class="post-images d-flex flex-wrap">
                                        ${imagesHTML}
                                    </div>
                                    <button class="nav-btn right-btn">→</button>
                                </div>
                                <div class="usrsP_activities">
                                    <div class="usrsP_like" value="${value.content.post_id}">
                                        <input type="hidden" class="content_id" value="${value.content.post_id}">
                                        <input type="hidden" class="poster_id" value="${value.content.user_id}">
                                        <p>${value.content.content_like}</p>
                                        <i class='bx bx-like'></i>
                                        <p>Like</p>
                                    </div>
                                    <div class="usrsP_comment" onclick="popupCommentModal(${value.content.post_id})">
                                        <i class="fa-regular fa-comment"></i>
                                        <p>Comment</p>
                                    </div>
                                    <div class="usrsP_share">
                                        <i class='bx bx-share'></i>
                                        <p>Share</p>
                                    </div>
                                </div>
                                <div class="usrsP_comment">
                                    <div class="usrspcomL">
                                        <img src="${value.content.profile_picture}" alt="Profile Image">
                                    </div>
                                    <div class="usrspcomR">
                                        <form action="add_comment.php" class="commentForm" method="post">
                                            <input type="hidden" name="post_id" value="${value.content.post_id}">
                                            <input type="text" name="comment" placeholder="Comment as ${value.content.firstname} ${value.content.lastname}">
                                            <button type="submit" class="commentBtn"><i class="fa-regular fa-paper-plane"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
        </div>
    </section>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./JS/main.js"></script>
    <script src="./JS/profilepage.js"></script>
    <script src="./JS/profile.js"></script>
</body>

</html>